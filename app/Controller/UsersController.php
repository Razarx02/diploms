<?php 

class UsersController extends AppController{

	public $uses = array('User');

	public function admin_login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        $this -> Session -> setFlash('Неверный логин или пароль', 'default', array('class' => 'error'));
	    }
	}

	public function admin_logout() {
	    return $this -> redirect($this -> Auth -> logout());
	}

	public function admin_index(){
		$users = $this -> User -> find('all');

		$this -> set( compact('users') );
	}

	public function admin_add(){
		if( $this -> request -> is('post') ){
			$this -> User -> create();

			$passwd = $this -> request -> data['User']['password'];
			$new_passwd = password_hash($passwd, PASSWORD_BCRYPT);
			$this -> request -> data['User']['password'] = $new_passwd;
			$this -> request -> data['User']['role'] = 'user';

			if( $this -> User -> save( $this -> request -> data ) ){
				$this -> Session -> setFlash('Пользователь создан', array(), 'good');
				$this -> redirect( $this -> referer() );
			} else{
				$this -> Session -> setFlash('Ошибка при создании пользователя', array(), 'bad');
			}

		}
	}

	public function admin_edit($user_id){
		if( is_null($user_id) || !(int)$user_id || !$this -> User -> exists($user_id) ){
			throw new Exception("Такого пользователя нет");
		}

		$data = $this -> User -> findById($user_id);
		$old_passwd = $data['User']['password'];

		if($this -> request -> is(array('post', 'put'))){
			$this -> User -> id = $user_id;
			$data_new = $this -> request -> data['User'];

			if( $data_new['password'] == $old_passwd ){
				unset($data_new['password']);
			} else{
				$passwd = $data_new['password'];
				$new_passwd = password_hash($passwd, PASSWORD_BCRYPT);
				$data_new['password'] = $new_passwd;
			}

			if($this -> User -> save($data_new)){
				$this -> Session -> setFlash('Сохранено', 'default', array(), 'good');
				return $this -> redirect($this -> referer());
			}else{
				$this -> Session -> setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this -> request -> data){
			$this -> request -> data = $data;
			
			$this->set(compact('id', 'data'));
		}
	}

	public function admin_delete($user_id){
		if( $this -> request -> is('get') ){
			throw new MethodNotAllowedException();
		}
		if( is_null($user_id) || !(int)$user_id ){
			throw new NotFoundException('Page not found .. .');
		}

		if( $this -> User -> delete($user_id) ){
			$this -> Session -> setFlash('Пост удален', array(), 'good');
			return $this -> redirect('/admin/users');
		} else{
			$this -> Session -> setFlash('Ошибка удаления', array(), 'bad');
		}
	}
}

 ?>