<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar', 'Session', 'Auth' => array(
		'loginRedirect' => '/admin/',
		'logoutRedirect' => '/',
		'authenticate' => array(
			'Form' => array(
				'passwordHasher' => 'Blowfish'
			)
		),
	));

	// public $uses = array('House');

	public function beforeFilter(){
		
		parent::beforeFilter();

		if( AuthComponent::user() ){
			$_SESSION['KCFINDER'] = array(
				'disabled' => false,
			);
		}

		$admin = (isset($this -> request -> params['prefix']) && $this -> request -> params['prefix'] == 'admin') ? 'admin/' : false;

		if(!$admin){
			$this -> Auth -> allow();
		}

		$login = $this -> Auth -> login();

		if( $admin){
			$this -> layout = 'default';
		} else {
			$this -> layout = 'index';	
		}

		// if(isset($this->params['language']) && $this->params['language'] == 'kz'){
        //     Configure::write('Config.language', 'kz');
        //     $this->Session->write('lang',  'kz');
        // }elseif(isset($this->params['language']) && $this->params['language'] == 'en'){
        //     Configure::write('Config.language', 'en');
        //     $this->Session->write('lang',  'en');
        // }else{
        //     Configure::write('Config.language', 'ru');
        // }

        
        // $l = Configure::read('Config.language');

		// $lang = ($this->params['language']) ? $this->params['language'] . '/' : '';

		// $this->House->locale = Configure::read('Config.language');

		// $house_list = $this->House->find('all');

		$this -> set( compact('admin', 'login', 'lang', 'l') );
	}
}
