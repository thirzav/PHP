<?php

class Producto {

    // Definir las propiedades de la clase
    private $product_id;
    private $nombre_p;
    private $duracion;
    private $descripcion;
    private $pve;
    private $fecha_crea_p;
    private $fecha_mod_p;

    // Constructor para inicializar los valores de las propiedades
    public function __construct($product_id, $nombre_p, $duracion, $descripcion, $pve, $fecha_crea_p, $fecha_mod_p) {
        $this->product_id = $product_id;
        $this->nombre_p = $nombre_p;
        $this->duracion = $duracion;
        $this->descripcion = $descripcion;
        $this->pve = $pve;
        $this->fecha_crea_p = $fecha_crea_p;
        $this->fecha_mod_p = $fecha_mod_p;
    }

    // Getters
    public function getProductId() {
        return $this->product_id;
    }

    public function getNombreP() {
        return $this->nombre_p;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPve() {
        return $this->pve;
    }

    public function getFechaCreaP() {
        return $this->fecha_crea_p;
    }

    public function getFechaModP() {
        return $this->fecha_mod_p;
    }

    // Setters
    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function setNombreP($nombre_p) {
        $this->nombre_p = $nombre_p;
    }

    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPve($pve) {
        $this->pve = $pve;
    }

}

