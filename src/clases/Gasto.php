<?php

class Gasto
{
    protected $id;
    public $id_categoria;
    public $id_usuario;
    public $monto;
    public $descripcion;
    public $fecha;

    public function __construct($id=null, $id_categoria = null,$id_usuario = null,$monto = null,$descripcion = null,$fecha = null)
    {
        $this->id = $id;
        $this->id_categoria = $id_categoria;
        $this->id_usuario = $id_usuario;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
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
