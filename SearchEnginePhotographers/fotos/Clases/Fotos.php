<?php

class Foto {

    // Propiedades privadas
    private $foto_id;
    private $nombre_foto;
    private $imagen1;
    private $imagen2;
    private $imagen3;
    private $imagen4;
    private $imagen5;
    private $fecha_crea_foto;
    private $fecha_mod_foto;

    // Constructor para inicializar las propiedades
    public function __construct($foto_id, $nombre_foto, $imagen1, $imagen2, $imagen3, $imagen4, $imagen5, $fecha_crea_foto, $fecha_mod_foto) {
        $this->foto_id = $foto_id;
        $this->nombre_foto = $nombre_foto;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
        $this->imagen3 = $imagen3;
        $this->imagen4 = $imagen4;
        $this->imagen5 = $imagen5;
        $this->fecha_crea_foto = $fecha_crea_foto;
        $this->fecha_mod_foto = $fecha_mod_foto;
    }

    // Getters
    public function getFotoId() {
        return $this->foto_id;
    }

    public function getNombreFoto() {
        return $this->nombre_foto;
    }

    public function getImagen1() {
        return $this->imagen1;
    }

    public function getImagen2() {
        return $this->imagen2;
    }

    public function getImagen3() {
        return $this->imagen3;
    }

    public function getImagen4() {
        return $this->imagen4;
    }

    public function getImagen5() {
        return $this->imagen5;
    }

    public function getFechaCreaFoto() {
        return $this->fecha_crea_foto;
    }

    public function getFechaModFoto() {
        return $this->fecha_mod_foto;
    }

    // Setters
    public function setFotoId($foto_id) {
        $this->foto_id = $foto_id;
    }

    public function setNombreFoto($nombre_foto) {
        $this->nombre_foto = $nombre_foto;
    }

    public function setImagen1($imagen1) {
        $this->imagen1 = $imagen1;
    }

    public function setImagen2($imagen2) {
        $this->imagen2 = $imagen2;
    }

    public function setImagen3($imagen3) {
        $this->imagen3 = $imagen3;
    }

    public function setImagen4($imagen4) {
        $this->imagen4 = $imagen4;
    }

    public function setImagen5($imagen5) {
        $this->imagen5 = $imagen5;
    }

}

?>
