<?php
class ingrediente {
    public $ingrediente;

    function getIngrediente(){
        return $this->$ingrediente;
    }
    function setIngrediente($ing){
        $this->$ingrediente = $ing;
    }

    function cadastrar($ingrediente){

    }
}
?>