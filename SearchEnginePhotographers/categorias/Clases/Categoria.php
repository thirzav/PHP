<?php

class Categoria {
    private $categoria_id;
    private $nombre_cat;
    private $fecha_creacion_cat;
    private $fecha_modificacion_cat;

    public function __construct($categoria_id, $nombre_cat, $fecha_creacion_cat, $fecha_modificacion_cat) {
        $this->categoria_id = $categoria_id;
        $this->nombre_cat = $nombre_cat;
        $this->fecha_creacion_cat = $fecha_creacion_cat;
        $this->fecha_modificacion_cat = $fecha_modificacion_cat;
    }

    // lista de getters

    public function getCategoriaId(){
        return $this->categoria_id;
    }

    public function getNombreCat(){
        return $this->nombre_cat;
    }

    public function getFechaCreaCat(){
        return $this->fecha_creacion_cat;
    }

    public function getFechaModCat(){
        return $this->fecha_modificacion_cat;
    }

    // lista de setters necesarios

    public function setNombreCat($nombreCat) {
        $this->nombre_cat = $nombreCat;
    }
}