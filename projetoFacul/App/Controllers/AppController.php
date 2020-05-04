<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

    public function novopost(){
        session_start();        
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){

            $post = Container::getModel('Post');
            $posts = $post->getAll();
        
            

            $this->view->posts = $posts;

            $this -> render('novoPost');
        } else {
            header('Location: /login?loginEr=erro');
        } 
    }

    public function post(){
        session_start();
    
        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $post = Container::getModel('Post');           
            $post -> __set('post', $_POST['post']);
            $post -> __set('id_usuario', $_SESSION['id']);
            $post -> __set('titulo', $_POST['titulo']);
            $post -> __set('autor', $_POST['autor']);
            $post->salvarPost();
            header('Location: /');

        } else {
            header('Location: /login?loginEr=erro');
        }
    }
    

}

?>