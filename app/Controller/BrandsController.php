<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class BrandsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */


/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    // public $uses = array('Adventage', "Brand");

	public function index()
	{	
		
	}

	public function admin_welcome() {		
	}

	public function admin_index() {
        $data = $this->Brand->find("all");
		$this->set("data", $data);
	}

	public function admin_add() {
        if( $this->request->is('post') ){
			$this->Brand->create();
			$data = $this->request->data;
			if( $this->Brand->save($data) ){
				$this->Session->setFlash('Бренд добавлен', 'default', array(), 'good');
				return $this->redirect( array("action" => "index") );
			} else{
				$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
			}
		}
    }

    public function admin_delete($id)
    {
        if( $this->request->is('get') ){
			throw new MethodNotAllowedException();
		}

		if( is_null($id) || !(int)$id ){
			throw new NotFoundException('Такой информаций нету');
		}

		if( $this->Brand->delete($id) ){
			$this->Session->setFlash('Информация удалена', 'default', array(), 'good');
			
			return $this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
    }

    public function admin_edit($id)
    {

        if( is_null($id) || !(int)$id || !$this->Brand->exists($id)){
			throw new NotFoundException('Такой страницы нету...');
		}

		$data = $this->Brand->findById($id);
		
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		if($this->request->is(array('post', 'put'))){
            $this->Brand->id = $id;  //  Указываем id поста
			$data1 = $this->request->data["Brand"];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if(empty($data1['doc']['name']) || !$data1['doc']['name']){
				unset($data1['doc']);
			}
			
			if($this->Brand->save($data1)){
				$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
				if (!empty($data1["img"]["name"])) {
					if($data1["img"]["name"] != $data["Brand"]["img"] ) {
						unlink(WWW_ROOT . 'img\brands\\' . $data["Brand"]["img"]);  // Удалить картинку с катлога img 
						unlink(WWW_ROOT . 'img\brands\thumbs\\' . $data["Brand"]["img"]); // Удалить картинку с катлога img 
					}
				}
				return $this->redirect(array("action" => "index"));
			} else {
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$this->set(compact('id', 'data'));
		}
    }

}
