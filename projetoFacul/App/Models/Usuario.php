<?php

namespace App\Models;
use MF\Model\Model;


class Usuario extends Model {

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $codPref;

    public function __get($atributo){
        return $this -> $atributo;
    }

    public function __set($atributo, $valor){
        $this -> $atributo = $valor;
    }

    //salvar no banco de Dados
    public function salvarDados(){
        $query = "INSERT INTO usuarios (nome, email, senha, codigoPref) VALUES (:nome, :email, :senha, :codigoPref)";
        $stmt = $this->db->prepare($query);

        $stmt -> bindValue(':nome', $this->__get('nome'));
        $stmt -> bindValue(':email', $this ->  __get('email'));
        $stmt -> bindValue(':senha', $this -> __get('senha'));
        $stmt -> bindValue(':codigoPref', $this -> __get('codPref'));
        $stmt -> execute();

        return $this;
    }


    public function validarDados(){
        $valido = true;

        if (strlen($this->__get('nome')) < 5 ){
            $valido = false;
        }
        if (strlen($this->__get('email')) < 3 ){
            $valido = false;
        }
        if(strlen($this->__get('senha')) < 5){
            $valido = false;
        }   
        return $valido;
    }

    public function getUsuarioPorEmail() {
        $query = "SELECT nome, email FROM usuarios WHERE email = :email";
        $stmt = $this ->db->prepare($query);
        $stmt -> bindValue(':email', $this->__get('email'));
        $stmt -> execute();

        return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
    }

        
    public function autenticarUser(){
        $query = "select id, nome, email from usuarios where email = :email and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt -> fetch(\PDO::FETCH_ASSOC);

        if($usuario['id'] != '' && $usuario['nome'] != ''){
            $this-> __set('id', $usuario['id']);
            $this-> __set('nome', $usuario['nome']);
        }

        return $this;
        
    }


}


?>