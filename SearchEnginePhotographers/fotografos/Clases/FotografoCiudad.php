<?php

class FotografoCiudad {
    private $fotografo_id;
    private $ciudad_f;
    private $fecha_crea_f;
    private $fecha_mod_f;

    public function __construct($fotografo_id, $ciudad_f, $fecha_crea_f, $fecha_mod_f) {
        $this->fotografo_id = $fotografo_id;
        $this->ciudad_f = $ciudad_f;
        $this->fecha_crea_f = $fecha_crea_f;
        $this->fecha_mod_f = $fecha_mod_f;
    }

    // lista de getters

    public function getFotografoId(){
        return $this->fotografo_id;
    }

    public function getCiudadF(){
        return $this->ciudad_f;
    }

    public function getFechaCreaF(){
        return $this->fecha_crea_f;
    }

    public function getFechaModF(){
        return $this->fecha_mod_f;
    }

    // lista de setters necesarios

    public function setCiudadF($ciudadF) {
        $this->ciudad_f = $ciudadF;
    }
}