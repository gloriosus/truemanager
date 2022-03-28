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
	Router::connect('/', array('controller' => 'home', 'action' => 'a_redirect'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

    Router::connect('/admin/users/page=:id', array('controller' => 'admin', 'action' => 'users'), array('pass' => array('id'), 'id' => '[0-9]+'));
    Router::connect('/admin/users/add', array('controller' => 'admin', 'action' => 'add_user'));
    Router::connect('/admin/users/edit/id=:id', array('controller' => 'admin', 'action' => 'edit_user'), array('pass' => array('id'), 'id' => '[0-9]+'));
    Router::connect('/admin/users/delete/id=:id', array('controller' => 'admin', 'action' => 'delete_user'), array('pass' => array('id'), 'id' => '[0-9]+'));

    Router::connect('/admin/users', array('controller' => 'admin', 'action' => 'a_redirect'));

    Router::connect('/admin/rewards/add', array('controller' => 'admin', 'action' => 'add_reward'));
    Router::connect('/admin/rewards/edit/id=:id', array('controller' => 'admin', 'action' => 'edit_reward'), array('pass' => array('id'), 'id' => '[0-9]+'));
    Router::connect('/admin/rewards/delete/id=:id', array('controller' => 'admin', 'action' => 'delete_reward'), array('pass' => array('id'), 'id' => '[0-9]+'));


    Router::connect('/leaders', array('controller' => 'leaders', 'action' => 'a_redirect'));
    Router::connect('/leaders/page=:page', array('controller' => 'leaders', 'action' => 'index'), array('pass' => array('page'), 'page' => '[0-9]+'));

    Router::connect('/auth/login', array('controller' => 'users', 'action' => 'login'));
    Router::connect('/auth/logout', array('controller' => 'users', 'action' => 'logout'));
    Router::connect('/auth/register', array('controller' => 'users', 'action' => 'register'));
    Router::connect('/auth/confirm', array('controller' => 'users', 'action' => 'confirm'));
    Router::connect('/auth/restore', array('controller' => 'users', 'action' => 'restore'));

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
