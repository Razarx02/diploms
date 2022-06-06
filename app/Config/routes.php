<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home', )); 
	// Router::connect('/about', array('controller' => 'pages', 'action' => 'about')); 
	// Router::connect('/flats', array('controller' => 'pages', 'action' => 'flats')); 
	// Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts')); 

	// Router::connect('/categories', array('controller' => 'categories', 'action' => 'index')); 
	// Router::connect('/categories/*', array('controller' => 'categories', 'action' => 'view'));

	// Router::connect('/news', array('controller' => 'news', 'action' => 'index')); 
	// Router::connect('/news/*', array('controller' => 'news', 'action' => 'view')); 

	// Router::connect('/vakancies', array('controller' => 'vakancies', 'action' => 'index')); 
	// Router::connect('/purchases', array('controller' => 'purchases', 'action' => 'index')); 
	// Router::connect('/banks', array('controller' => 'banks', 'action' => 'index')); 

	// Router::connect('/search', array('controller' => 'search', 'action' => 'index')); 

	Router::connect('/admin/users/:action', array('controller' => 'users', 'admin' => true));	
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'welcome', 'admin' => true));

	// Router::connect('/:language', 
	// 	array('controller' => 'pages', 'action' => 'home'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/about', 
	// 	array('controller' => 'pages', 'action' => 'about'),
	// 	array('language' => '[a-z]{2}')
	// );
	// Router::connect('/:language/flats', 
	// 	array('controller' => 'pages', 'action' => 'flats'),
	// 	array('language' => '[a-z]{2}')
	// );
	// Router::connect('/:language/contacts', 
	// 	array('controller' => 'pages', 'action' => 'contacts'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/search', 
	// 	array('controller' => 'search', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/houses', 
	// 	array('controller' => 'houses', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );
	// Router::connect('/:language/house/*', 
	// 	array('controller' => 'houses', 'action' => 'view'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/news', 
	// 	array('controller' => 'news', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );
	// Router::connect('/:language/news/*', 
	// 	array('controller' => 'news', 'action' => 'view'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/vakancies', 
	// 	array('controller' => 'vakancies', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/purchases', 
	// 	array('controller' => 'purchases', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );

	// Router::connect('/:language/banks', 
	// 	array('controller' => 'banks', 'action' => 'index'),
	// 	array('language' => '[a-z]{2}')
	// );


/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	// Router::connect('/pages/:action', array('controller' => 'pages'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
