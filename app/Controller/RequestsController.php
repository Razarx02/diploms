<?php 

App::uses('CakeEmail', 'Network/Email');

class RequestsController extends AppController{

	// public $helpers = array('Html', 'Form', 'Session');
	public $uses = array('Request');
	public $components = array('Paginator');

	public function admin_index(){
		$this->Paginator->settings = array(
			'recursive' => '-1',
			'limit' => 30,
			'order' => 'id DESC',
		);
		$requests = $this->Paginator->paginate('Request');
		$this->set( compact('requests') );
	}

	
	public function send(){
		if( $this->request->is('post') ){

			$data = $this->request->data;
			// debug($data); die;
			$email = new CakeEmail('smtp');
			// debug($data);
			$email->from(array('RAzarx02@yandex.ru' => 'zerek-bala.kz'))->to("specialforalem@mail.ru")->subject('Новая заявка с сайта');
			$message = '<p><strong>Новый заказ с сайта</strong></p>'.
			 
			'<p><b>Имя:</b> ' . $data['name'] . '</p> '.
			'<p><b>Контактный телефон:</b> ' . $data['phone'] . '</p> <br><br> ' . $data["type_text"] ;
			
			$email->emailFormat('html');
			$email->send($message);
	
			if( $this->Request->save($data) ){
				$this->Session->setFlash('Ваша заявка принята', 'default', array(), 'good');
				return $this->redirect( $this->referer() );

			} else {
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_view($id) {
		$request = $this->Request->findById($id);
		$this->set('request', $request);
	}


	public function vakancy(){
		if( $this->request->is('post') ){
			$data = $this->request->data['Request'];

			$doc_name = $this->_customUploadDoc($data['doc']);
			$data['doc'] = $doc_name;

			if( empty($data['doc']) || !$data['doc'] ){
			 	unset($data['doc']);
			}

			if( $this->Request->save($data) ){
				$this->Session->setFlash('Ваша заявка принята', 'default', array(), 'good');
				return $this->redirect( $this->referer() );
			} else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	// public function vakancy(){
	// 	if( $this->request->is('post') ){
	// 		$data = $this->request->data['Request'];

	// 		$doc_name = $this->_customUploadDoc($data['doc']);
	// 		$data['doc'] = $doc_name;

	// 		if( empty($data['doc']) || !$data['doc'] ){
	// 		 	unset($data['doc']);
	// 		}

	// 		$email = new CakeEmail('smtp');
	// 		$email->from(array('st-kotel.kz@yandex.ru' => 'kanfar.kz'))
	// 			// ->to('info@kazhim.com')
	// 			->to('jas_98kz@mail.ru')
	// 			->subject('Новая заявка с сайта kanfar.kz');

	// 		if(empty($data['email'])) $data['email'] = '-';
	// 		if(empty($data['phone'])) $data['phone'] = '-';
			
	// 		$message = '<p><b>Отклик на вакансию</b></p><p><b>Имя:</b> ' . $data['name'] . ',</p><p><b>Телефон:</b> ' . $data['phone'] . ',</p><p><b>E-mail:</b> ' . $data['email'] . '</p>';

	// 		$email->emailFormat('html');
			
	// 		if( $email->send($message) ){
	// 			$this->Session->setFlash('Ваша заявка принята', 'default', array(), 'good');
	// 			$this->Request->save($data);
	// 			return $this->redirect($this->referer());
	// 		}else{
	// 			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
	// 			return $this->redirect($this->referer());
	// 		}
	// 	}
	// }

	public function admin_delete($item_id){
		if( $this->request->is('get') ){
			throw new MethodNotAllowedException();
		}
		if( is_null($item_id) || !(int)$item_id ){
			throw new NotFoundException('Такой страницы нету');
		}

		if( $this->Request->delete($item_id) ){
			$this->Session->setFlash('Заявка удалена', 'default', array(), 'good');
			return $this->redirect( $this->referer() );
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
	}

	protected function _customUploadDoc($file = array()){
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
		$fileName = $this->_genNameFileDoc($ext);
		$path = WWW_ROOT . 'files/vakancies/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		return $fileName;
	}

	protected function _genNameFileDoc($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . 'files/vakancies/' . $name)){
			$name = $this->_genNameFileDoc($ext);
		}
		return $name;
	}
}

 ?>