<?php

class Usuario{
    private $idusuario;
    private $login;
    private $senha;
    private $data;

    

    /**
     * Set the value of idusuario
     *
     * @return  self
     */ 
    public function setIdusuario($value)
    {
        $this->idusuario = $value;

        return $this;
    }

    /**
     * Get the value of idusuario
     */ 
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function loadById($id){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID" => $id
        ));

        if (count($result) > 0) {
            
            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setData(new DateTime($row['dtcadastro']));
        }
    }

    public static function getList(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios ORDER BY idusuario");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_usuarios WHERE login LIKE :SEARCH ORDER BY login", array(
        ':SEARCH'=>"%".$login."%"
        ));
       
    }

    public function login($login, $senha){
        $sql = new Sql();
        $result = $sql->select("SELECT * FROM tb_usuarios WHERE login = :LOGIN AND senha = :SENHA" , array(
            ":LOGIN" => $login,
            ":SENHA" => $senha
        ));

        if (count($result) > 0) {
            
            $row = $result[0];

            $this->setIdusuario($row['idusuario']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setData(new DateTime($row['dtcadastro']));
        }else{
            throw new Exception("Login e ou senha inválidos");
        }
    }

    public function __toString()
    {
        return json_encode((array(
            "idusuario"=>$this->getIdusuario(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "dtcadastro"=>$this->getData()
        )));
    }
}