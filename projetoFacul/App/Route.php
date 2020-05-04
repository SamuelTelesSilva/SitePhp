<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes ['cadastro'] =  array(
			'route' => '/cadastro',
			'controller' => 'indexController',
			'action' => 'cadastro'
		);

		$routes['download'] = array(
			'route' => '/download',
			'controller' => 'indexController',
			'action' => 'downl'
		);

		$routes ['login'] =  array(
			'route' => '/login',
			'controller' => 'indexController',
			'action' => 'login'
		);

		$routes ['tutorial'] =  array(
			'route' => '/tutorial',
			'controller' => 'indexController',
			'action' => 'tutorial'
		);

		$routes ['registrar'] =  array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes ['autenticar'] =  array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes ['novopost'] =  array(
			'route' => '/novopost',
			'controller' => 'AppController',
			'action' => 'novopost'
		);

		$routes ['sair'] =  array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$routes ['post'] =  array(
			'route' => '/post',
			'controller' => 'AppController',
			'action' => 'post'
		);		

		$this->setRoutes($routes);
	}

}

?>