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
class CategoriesController extends AppController {

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
	public $uses = array('Category', 'Subcategory');
	public $components = array('Paginator');

	public function index()
	{	
		$categories = $this->Category->find("all");
		// $subcategories = $this->Subcategory->find("all");
		$this->set(compact("categories"));
	
	}

    public function view($id)
	{	


	}

	public function subcategory($id) {
		$subcategories = $this->Subcategory->find("all", array(
			"conditions" => array("category_id" => $id)
		));
		$categories = $this->Category->findById($id);
		$this->set(compact("subcategories", "categories"));
	}



	public function admin_index() {
		$data = $this->Category->find("all");
		$this->set("data", $data);
	}

	public function admin_add() {
        if( $this->request->is('post') ){
			$this->Category->create();
			$data = $this->request->data;
			if( $this->Category->save($data) ){
				$this->Session->setFlash('Категория добавлена', 'default', array(), 'good');
				return $this->redirect( array("action" => "index") );
			} else{
				$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
			}
		}
    }
	public function admin_subcategoryadd($id) {
		$this->set(compact('id'));
        if( $this->request->is('post') ){
			$this->Subcategory->create();
			$data = $this->request->data;
			// debug($data); die;
			if( $this->Subcategory->save($data) ){
				$this->Session->setFlash('Подкатегория добавлена', 'default', array(), 'good');
				return $this->redirect(  array('controller' => 'categories', 'action' => 'edit', $data["Subcategory"]["category_id"]) );
			} else {
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

		if( $this->Category->delete($id) ){
			$this->Session->setFlash('Информация удалена', 'default', array(), 'good');
			
			return $this->redirect( array("action" => "index") );
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
    }

	public function admin_subcategorydelete($id)
    {
        if( $this->request->is('get') ){
			throw new MethodNotAllowedException();
		}

		if( is_null($id) || !(int)$id ){
			throw new NotFoundException('Такой информаций нету');
		}

		if( $this->Subcategory->delete($id) ){
			$this->Session->setFlash('Информация удалена', 'default', array(), 'good');
			
			return $this->redirect( $this->referer());
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
    }

    public function admin_edit($id)
    {

        if( is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой страницы нету...');
		}

		$data = $this->Category->findById($id);
		
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		$subcategories = $this->Subcategory->find("all");
		if($this->request->is(array('post', 'put'))){
            $this->Category->id = $id;  //  Указываем id поста
			$data1 = $this->request->data["Category"];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			// if(empty($data1['doc']['name']) || !$data1['doc']['name']){
			// 	unset($data1['doc']);
			// }
			
			if($this->Category->save($data1)){
				$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
				if (!empty($data1["img"]["name"])) {
					if($data1["img"]["name"] != $data["Category"]["img"] ) {
						unlink(WWW_ROOT . 'img\categories\\' . $data["Category"]["img"]);  // Удалить картинку с катлога img 
						unlink(WWW_ROOT . 'img\categories\thumbs\\' . $data["Category"]["img"]); // Удалить картинку с катлога img 
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
			$this->set(compact('id', 'data', "subcategories"));
		}
    }



	public function admin_subcategoryedit($id)
{

	if( is_null($id) || !(int)$id || !$this->Subcategory->exists($id)){
		throw new NotFoundException('Такой страницы нету...');
	}

	$data = $this->Subcategory->findById($id);
	
	if(!$id){
		throw new NotFoundException('Такой страницы нет...');
	}
	// $subcategories = $this->Subcategory->find("all");
	if($this->request->is(array('post', 'put'))){
		$this->Subcategory->id = $id;  //  Указываем id поста
		$data1 = $this->request->data["Subcategory"];
		if(empty($data1['img']['name']) || !$data1['img']['name']){
			unset($data1['img']);
		}
		// if(empty($data1['doc']['name']) || !$data1['doc']['name']){
		// 	unset($data1['doc']);
		// }
		// debug($data); die;
		if($this->Subcategory->save($data1)){
			$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
			if (!empty($data1["img"]["name"])) {
				if($data1["img"]["name"] != $data["Subcategory"]["img"] ) {
					unlink(WWW_ROOT . 'img\subcategories\\' . $data["Subcategory"]["img"]);  // Удалить картинку с катлога img 
					unlink(WWW_ROOT . 'img\subcategories\thumbs\\' . $data["Subcategory"]["img"]); // Удалить картинку с катлога img 
				}
			}
			return $this->redirect(array('controller' => 'categories', 'action' => 'edit', $data["Subcategory"]["category_id"]) );
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


