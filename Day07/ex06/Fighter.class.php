<?php

class Fighter{
    private $name;
    public function __construct($nom){
        $this->name = $nom;
    }
    function get_name(){
        return($this->name);
    }
}
?>