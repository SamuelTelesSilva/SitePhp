<?php

namespace App\Models;
use MF\Model\Model;


class Post extends Model {

    private $id;
    private $id_usuario;
    private $post;
    private $data;
    private $imagem;
    private $titulo;
    private $autor;

    public function __get($atributo){
        return $this -> $atributo;
    }

    public function __set($atributo, $valor){
        $this -> $atributo = $valor;
    }

    public function salvarPost(){
    
        $query = "INSERT INTO posts (id_usuario, posts, titulo, autor) VALUES (:id_usuario, :post, :titulo, :autor)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':post', $this->__get('post'));
        $stmt->bindValue(':titulo', $this->__get('titulo'));
        $stmt->bindValue(':autor', $this->__get('autor'));
        $stmt->execute();
        return $this;
    }

    public function getAll() {
        $query = "
            SELECT t.id, t.id_usuario, u.nome, t.posts, t.titulo, t.autor, DATE_FORMAT(t.dataP, '%d/%m/%Y %H:%i') as dataP  
            FROM posts as t 
            left join usuarios as u on (t.id_usuario = u.id)
            ORDER BY T.dataP DESC
        
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>