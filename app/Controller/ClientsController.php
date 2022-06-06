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
class ClientsController extends AppController {

	public $uses =  array('Bonus', 'Client');
	public $components = array('Paginator');

	public function index()
	{	
		
	}

	public function admin_welcome() {		
	}

	public function admin_bonus($id) {

		$clientdata = $this->Client->findById($id);

		$this->Paginator->settings = array(
				'recursive' => '-1',
				'limit' => "12",
				'order' => 'id DESC',
				'conditions' => array(
					"client" => $id
				)
			);
		$bonusAllData = $this->Paginator->paginate('Bonus');
		if( $this->request->is('post') ){  
			
			$bonusdata = $this->request->data["Bonus"];
			$oldAllBonus = $bonusdata["allbonus"];
			$bonusdata["bonus"] = floatval($bonusdata["money"]) * (floatval($bonusdata["percent"]) / 100);
			$bonusdata["allbonus"] = floatval($oldAllBonus) + $bonusdata["bonus"];
			// debug($bonusdata); die;
			$clientdata["Client"]["allsume"] = $clientdata["Client"]["allsume"] +  floatval($bonusdata["money"]);
			$clientdata["Client"]["bonus"] = $bonusdata["allbonus"] ;
			$bonusdata["aftermoney"] = $clientdata["Client"]["allsume"];
			// debug($clientdata); die;
			if( $this->Bonus->save($bonusdata) && $this->Client->save($clientdata) ){
				
				$this->Session->setFlash('Бонус добавлен', 'default', array(), 'good');
				return $this->redirect( $this->referer() );
			} else{
				$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
			}
		} 

		if( $this->request->query ){  
			$bonusdataget = $this->request->query;
			if($clientdata["Client"]["bonus"] >= $bonusdataget["bonus"]) {

				$clientdata["Client"]["bonus"] = $clientdata["Client"]["bonus"] - $bonusdataget["bonus"];   
				$bonusdataget["allbonus"] = $clientdata["Client"]["bonus"];

							// debug($clientdata); die;
				if( $this->Bonus->save($bonusdataget) && $this->Client->save($clientdata) ){
					
					$this->Session->setFlash('Бонус использован', 'default', array(), 'good');
					return $this->redirect( $this->referer() );
				} else{
					$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
				}
			} else {
				$this->Session->setFlash('Не хватает бонусы', 'default', array(), 'bad');
			}
			
		} 
		// debug($bonusAllData); die;
		$this->set(compact('clientdata', "bonusAllData"));
		
	}
	public function admin_bonusedit($id,$idcli) { 
		// sos has errors
		if( is_null($id) || !(int)$id || !$this->Bonus->exists($id)){
			throw new NotFoundException('Такой страницы нету...');
		}

		$data = $this->Bonus->findById($id);
		
		$clientdata = $this->Client->findById($idcli);

		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		if($this->request->is(array('post', 'put'))){
            $this->Client->id = $id;  //  Указываем id поста
			$bonusdata = $this->request->data["Bonus"];
			// Чтобы вернуть значение до изменение
			$bonusdata["allbonus"] = $bonusdata["allbonus"] - $data["Bonus"]["bonus"];
			$bonusdata["aftermoney"] = $data["Bonus"]["aftermoney"] - $bonusdata["money"];
			$clientdata["Client"]["allsume"] = $bonusdata["aftermoney"];
			$clientdata["Client"]["bonus"] = $bonusdata["allbonus"];


			$oldAllBonus = $bonusdata["allbonus"];
			$bonusdata["bonus"] = floatval($bonusdata["money"]) * (floatval($bonusdata["percent"]) / 100);
			$bonusdata["allbonus"] = floatval($oldAllBonus) + $bonusdata["bonus"];
			$clientdata["Client"]["allsume"] = $clientdata["Client"]["allsume"] +  floatval($bonusdata["money"]);
			$clientdata["Client"]["bonus"] = $bonusdata["allbonus"] ;
			$bonusdata["aftermoney"] = $clientdata["Client"]["allsume"];
			debug($bonusdata); die;
			if( $this->Bonus->save($bonusdata) && $this->Client->save($clientdata) ){
				
				$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
				return $this->redirect( $this->referer() );
			} else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}

		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$this->set(compact('id', 'data', 'clientdata'));
		}	
	}

	public function admin_index() {

	   	if( $this->request->is('post') ){ 
	   		$ter = $this->request->data["Client"];
	   		$this->Paginator->settings = array(
				'recursive' => '-1',
				'limit' => "20",
				'order' => 'id DESC',
				'conditions' => array(
					"OR" => array(
						array("number LIKE" => '%' . $ter["search"] . '%'),
				 		array("name LIKE" => '%' . $ter["search"] . '%'),
						array("surname LIKE" => '%' . $ter["search"] . '%'),
					)
				)
			);
			$data = $this->Paginator->paginate('Client');
	   	} else {
	   		$this->Paginator->settings = array(
			'recursive' => '-1',
			'limit' => "20",
			'order' => 'allsume DESC',
			// 'conditions' => array(
			// 	"name" => $ter,
			// 	"surname" => $ter,
			// 	"number" => $ter,
			// )
			);
			$data = $this->Paginator->paginate('Client');
	   	}

        
		$this->set("data", $data);

	}

	public function admin_add() {
        if( $this->request->is('post') ){
			$this->Client->create();
			$data = $this->request->data;
			if( $this->Client->save($data) ){
				$this->Session->setFlash('Клиент добавлен', 'default', array(), 'good');
				return $this->redirect( array("action" => "index") );
			} else{
				$this->Session->setFlash('Ошибка добавления', 'default', array(), 'bad');
			}
		}
    }

    public function admin_bonusdelete($id)
    {
        if( $this->request->is('get') ){
			throw new MethodNotAllowedException();
		}

		if( is_null($id) || !(int)$id ){
			throw new NotFoundException('Такой информаций нету');
		}

		if( $this->Bonus->delete($id) ){
			$this->Session->setFlash('Информация удалена из списка', 'default', array(), 'good');
			
			return $this->redirect( $this->referer() );
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
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

		if( $this->Client->delete($id) ){
			$this->Session->setFlash('Информация удалена', 'default', array(), 'good');
			
			return $this->redirect( $this->referer() );
		} else{
			$this->Session->setFlash( 'Ошибка удаления', 'default', array(), 'bad');
		}
    }

    public function admin_edit($id)
    {

        if( is_null($id) || !(int)$id || !$this->Client->exists($id)){
			throw new NotFoundException('Такой страницы нету...');
		}

		$data = $this->Client->findById($id);
		
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		
		if($this->request->is(array('post', 'put'))){
            $this->Client->id = $id;  //  Указываем id поста
			$data1 = $this->request->data["Client"];
			
			
			if($this->Client->save($data1)){
				$this->Session->setFlash('Изменение прошло успешно', 'default', array(), 'good');
				if (!empty($data1["img"]["name"])) {
					
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
