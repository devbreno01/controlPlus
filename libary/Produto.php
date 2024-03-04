<?php 


class Produto{

    private $id;
    private $codigo;
    private $nome;
    private $preco;

    public function __construct($id, $codigo,$nome,$preco )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->preco = $preco;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function getId(){
        return $this->id;
    }
    public function getPreco(){
        return $this->preco;
    }
    

}