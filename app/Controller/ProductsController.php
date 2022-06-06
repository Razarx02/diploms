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
class ProductsController extends AppController {

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
	public $uses = array('Category', 'Subcategory', 'Product', 'Gallery', 'Brand');
	public $components = array('Paginator');

	public function index($id = 0, $sec = 0) {

		$category = $this->Category->find('all');
		$subcategory = $this->Subcategory->find('all');
		$brands =  $this->Brand->find('all');

		if(!empty($this->request->query['brands'])) {
			$requests = array('brand'=> $this->request->query['brands']);
		} else {
			$requests = "";
		}

		if(!empty($this->request->query['price_from'])) {
			$price_from = array('price >='=> $this->request->query['price_from']);
		} else {
			$price_from = "";
		}

		if(!empty($this->request->query['price_to'])) {
			$price_to = array('price <='=> $this->request->query['price_to']);
		} else {
			$price_to = "";
		}
		
		if(!empty($this->request->query['price__order'])) {
			if($this->request->query['price__order'] == 1 ) {
				$price__order = array('price' => "ASC");
			} else {
				$price__order = array('price' => "DESC");
			}
			
		} else {
			$price__order = "id DESC";
		}
		
		
		
		// debug($requests); die;
		if($id != 0)  {
			if($sec != 0) {
				$this->Paginator->settings = array(
					'recursive' => '-1',
					'limit' => "12",
					'order' => $price__order,
					'conditions' => array(
						"category_id" => $id,
						'subcategory_id' => $sec,
						$requests,
						$price_to ,
						// $price_from,
					)
				);
			} else {
				$this->Paginator->settings = array(
					'recursive' => '-1',
					'limit' => "12",
					'order' => $price__order,
					'conditions' => array("category_id" => $id,	 
					$requests,
					$price_to ,
						$price_from,
						// $price__order 
					)
				);
			}
		} else {
			$this->Paginator->settings = array(
				'recursive' => '-1',
				'limit' => "12",
				'order' => $price__order,
				'conditions' => array(
					 $requests,
					 $price_to ,
						$price_from,
						// $price__order
				)
			);
		}
		
		
		$products = $this->Paginator->paginate('Product');

		$this->set( compact('products', 'category', 'subcategory', 'brands') );
	}

	public function view($id) {

		$product = $this->Product->findById($id);

		$otherProducts = $this->Product->find('all', array(
			'conditions' => array(
				"id !=" => $id,
				"category_id" => $product["Product"]["category_id"]
			),
			'limit' => 4
		));

		$galleries = $this->Gallery->find("all",array(
			"conditions" => array(
				"product_id" => $product["Product"]["id"]
			)
		));
		
		$this->set(compact("product", 'otherProducts', "galleries"));
	}
	
	public function basket() {

	}

	public function apiview($id = false) {
		$this->layout = false;
		if($id== false) {
			$response = $this->Product->find("all");
		} else {
			$response = $this->Product->findById($id);
		}
		  
		 $this->response->type('application/json');
    	$this->response->body(json_encode($response));
    	return $this->response->send();
	}

	public function allsite() {
		$text = $this->request->query["text"];
		$data = $this->Product->find("all", array(
			'conditions' => array(
				'Product.title LIKE' => '%' . $text . '%'
			)
		));

		$this->set(compact("data", "text"));
	}

	public function subview($id) {
		$subcategory = $this->Subcategory->findById($id); 
	
		$category = $this->Category->findById( $subcategory["Subcategory"]["category_id"] );
		$this->Paginator->settings = array(
			'recursive' => '-1',
			'limit' => "12",
			'order' => 'id DESC',
			'conditions' => array(
				"subcategory_id" => $id, 
				"category_id" => $subcategory["Subcategory"]["category_id"]
			)
		);

		$products = $this->Paginator->paginate('Product');
	
		$this->set( compact('products', 'subcategory', "category") );
	}

	public function admin_index($id = "all") {
		$categories = $this->Category->find("all");
		if($id == "all") {
			// $data = $this->Product->find("all");
			$this->Paginator->settings = array(
				'recursive' => '-1',
				'limit' => "5",
				'order' => 'id DESC'
				// 'conditions' => array("category_id" => $id)
			);
			$data = $this->Paginator->paginate('Product');
		
		} else {
			$this->Paginator->settings = array(
				'recursive' => '-1',
				'limit' => "5",
				'order' => 'id DESC',
				'conditions' => array("category_id" => $id)
			);
			$data = $this->Paginator->paginate('Product');
			// $data = $this->Product->find("all");
		}
		
		$this->set(compact("data", "categories"));
	}

	public function admin_add() {

		$categoriesdata = $this->Category->find("all");
		$categoryArray = array();
		$subcategoriesdata = $this->Subcategory->find("all");
		$brandsdata = $this->Brand->find("all");
		// $subcategoriesdata = $this->Subcategory->find("all");
		$subcategoriesJson = json_encode($subcategoriesdata, JSON_UNESCAPED_UNICODE);
		foreach($categoriesdata as $item) {
			$categoryArray[$item["Category"]["id"]] = $item["Category"]["title"] ;
		}
	
		$this->set(compact("categoryArray", "subcategoriesdata", "brandsdata", "subcategoriesJson"));

        if( $this->request->is('post') ){
			$this->Product->create();
			$data = $this->request->data;
			if( $this->Product->save($data) ){
				$this->Session->setFlash('Товар добавлен', 'default', array(), 'good');
				return $this->redirect( array("action" => "index") );
			} else{
				$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
				return $this->redirect( $this->referer() );
			}
		}
    }

	
    public function admin_delete($id)
    {	
		$data = $this->Product->findById($id);
        if( $this->request->is('get') ){
			throw new MethodNotAllowedException();
		}

		if( is_null($id) || !(int)$id ){
			throw new NotFoundException('Такой информаций нету');
		}

		if( $this->Product->delete($id) ){
			$this->Session->setFlash('Информация удалена', 'default', array(), 'good');
			unlink(WWW_ROOT . 'img/products//' . $data["Product"]["img"]);  // Удалить картинку с катлога img 
			unlink(WWW_ROOT . 'img/products/thumbs//' . $data["Product"]["img"]);
			return $this->redirect( array("action" => "index") );
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
    }

    public function admin_edit($id)
    {
		
		$categoriesdata = $this->Category->find("all");
		$categoryArray = array();
		$subcategoriesdata = $this->Subcategory->find("all");
		$subcategoriesJson = json_encode($subcategoriesdata, JSON_UNESCAPED_UNICODE);
		$images = $this->Gallery->find('all');
		$brandsdata = $this->Brand->find("all");
		foreach($categoriesdata as $item) {
			$categoryArray[$item["Category"]["id"]] = $item["Category"]["title"] ;
		}
	
        if( is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нету...');
		}

		$data = $this->Product->findById($id);
		
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		if($this->request->is(array('post', 'put'))){
            $this->Product->id = $id;  //  Указываем id поста
			$data1 = $this->request->data["Product"];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if($this->Product->save($data1)){
				$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
				if (!empty($data1["img"]["name"])) {
					if($data1["img"]["name"] != $data["Product"]["img"] ) {
						unlink(WWW_ROOT . 'img/products//' . $data["Product"]["img"]);  // Удалить картинку с катлога img 
						unlink(WWW_ROOT . 'img/products/thumbs//' . $data["Product"]["img"]); // Удалить картинку с катлога img 
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
			$this->set(compact('id', 'data','categoryArray', 'subcategoriesdata', 'images', "brandsdata", "subcategoriesJson"));
		}
    }

}
