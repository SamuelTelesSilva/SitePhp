<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$post = Container::getModel('Post');
		$posts = $post->getAll();
		
		$this->view->posts = $posts;
		$this -> render('index');	
	}

	public function downl(){
		$this -> render ('download');
	}

	public function cadastro(){
		$this -> view -> erroCadastro = false;
		$this -> render ('cadastro');
	}

	public function login(){
		$this->view->loginEr = isset($_GET['loginEr']) ? $_GET['loginEr'] : '';
		$this -> render ('login');
	}

	public function novoPost(){
		$this -> render ('novoPost');
	}

	public function tutorial(){
		$this -> render ('tutorial');
	}

	public function registrar(){
		//receber dados do formulario
		$usuario = Container::getModel('Usuario');
		$usuario -> __set('nome', $_POST['nome']);
		$usuario -> __set('email', $_POST['email']);
		$usuario -> __set('senha', $_POST['senha']); //$usuario -> __set('senha', md5($_POST['senha']));
		$usuario -> __set('codPref', $_POST['cod']);

		//Salvando os DADOS
		

		if ($usuario -> validarDados() && count($usuario -> getUsuarioPorEmail()) == 0){
				$usuario -> salvarDados();
				$this -> render('cadastroRealizado');
		}else{
			$this -> view -> erroCadastro = true;
			$this -> render ('cadastro');
		}
	}

	public function mostrarPost(){
       

           
        
	}
}


?>