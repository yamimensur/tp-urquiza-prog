<?php

class Categoria
{
   protected $id_categoria;
   public $nombre_categoria;

   public function __construct($nombre_categoria,$id_categoria=null)
   {
       $this->nombre_categoria = $nombre_categoria;
       $this->id_categoria = $id_categoria;
   }

   public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    
}