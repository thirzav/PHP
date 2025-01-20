<?php

class ProductoFotografo {

    // Definir las propiedades de la clase
    private $product_id;
    private $nombre_p;
    private $duracion;
    private $descripcion;
    private $pve;
    private $fecha_crea_p;
    private $fecha_mod_p;
    private $fotografo_id;
    private $nombre_f;
    private $apellido1_f;
    private $apellido2_f;
    private $nombre_empresa;
    private $nif;
    private $direccion_calle_f;
    private $postcode_f;
    private $ciudad_f;
    private $descripcion_f;
    private $foto_perfil;
    private $telefono_f;
    private $email_f;
    private $pass_f;
    private $rol;
    private $fecha_crea_f;
    private $fecha_mod_f;
    private $foto_id;
    private $nombre_foto;
    private $imagen1;
    private $imagen2;
    private $imagen3;
    private $imagen4;
    private $imagen5;
    private $fecha_crea_foto;
    private $fecha_mod_foto;
    private $nombre_cat;

    // Constructor
    public function __construct($product_id, $nombre_p, $duracion, $descripcion, $pve, $fecha_crea_p, $fecha_mod_p, 
                                $fotografo_id, $nombre_f, $apellido1_f, $apellido2_f, $nombre_empresa, $nif, 
                                $direccion_calle_f, $postcode_f, $ciudad_f, $descripcion_f, $foto_perfil, 
                                $telefono_f, $email_f, $pass_f, $rol, $fecha_crea_f, $fecha_mod_f, $foto_id, 
                                $nombre_foto, $imagen1, $imagen2, $imagen3, $imagen4, $imagen5, 
                                $fecha_crea_foto, $fecha_mod_foto, $nombre_cat) {
        // Asignar valores a las propiedades a través del constructor
        $this->product_id = $product_id;
        $this->nombre_p = $nombre_p;
        $this->duracion = $duracion;
        $this->descripcion = $descripcion;
        $this->pve = $pve;
        $this->fecha_crea_p = $fecha_crea_p;
        $this->fecha_mod_p = $fecha_mod_p;
        $this->fotografo_id = $fotografo_id;
        $this->nombre_f = $nombre_f;
        $this->apellido1_f = $apellido1_f;
        $this->apellido2_f = $apellido2_f;
        $this->nombre_empresa = $nombre_empresa;
        $this->nif = $nif;
        $this->direccion_calle_f = $direccion_calle_f;
        $this->postcode_f = $postcode_f;
        $this->ciudad_f = $ciudad_f;
        $this->descripcion_f = $descripcion_f;
        $this->foto_perfil = $foto_perfil;
        $this->telefono_f = $telefono_f;
        $this->email_f = $email_f;
        $this->pass_f = $pass_f;
        $this->rol = $rol;
        $this->fecha_crea_f = $fecha_crea_f;
        $this->fecha_mod_f = $fecha_mod_f;
        $this->foto_id = $foto_id;
        $this->nombre_foto = $nombre_foto;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
        $this->imagen3 = $imagen3;
        $this->imagen4 = $imagen4;
        $this->imagen5 = $imagen5;
        $this->fecha_crea_foto = $fecha_crea_foto;
        $this->fecha_mod_foto = $fecha_mod_foto;
        $this->nombre_cat = $nombre_cat;
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

    public function getFotografoId() {
        return $this->fotografo_id;
    }

    public function getNombreF() {
        return $this->nombre_f;
    }

    public function getApellido1F() {
        return $this->apellido1_f;
    }

    public function getApellido2F() {
        return $this->apellido2_f;
    }

    public function getNombreEmpresa() {
        return $this->nombre_empresa;
    }

    public function getNif() {
        return $this->nif;
    }

    public function getDireccionCalleF() {
        return $this->direccion_calle_f;
    }

    public function getPostcodeF() {
        return $this->postcode_f;
    }

    public function getCiudadF() {
        return $this->ciudad_f;
    }

    public function getDescripcionF() {
        return $this->descripcion_f;
    }

    public function getFotoPerfil() {
        return $this->foto_perfil;
    }

    public function getTelefonoF() {
        return $this->telefono_f;
    }

    public function getEmailF() {
        return $this->email_f;
    }

    public function getPassF() {
        return $this->pass_f;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getFechaCreaF() {
        return $this->fecha_crea_f;
    }

    public function getFechaModF() {
        return $this->fecha_mod_f;
    }

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

    public function getNombreCat() {
        return $this->nombre_cat;
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

    public function setFechaCreaP($fecha_crea_p) {
        $this->fecha_crea_p = $fecha_crea_p;
    }

    public function setFechaModP($fecha_mod_p) {
        $this->fecha_mod_p = $fecha_mod_p;
    }

    public function setFotografoId($fotografo_id) {
        $this->fotografo_id = $fotografo_id;
    }

    public function setNombreF($nombre_f) {
        $this->nombre_f = $nombre_f;
    }

    public function setApellido1F($apellido1_f) {
        $this->apellido1_f = $apellido1_f;
    }

    public function setApellido2F($apellido2_f) {
        $this->apellido2_f = $apellido2_f;
    }

    public function setNombreEmpresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }

    public function setNif($nif) {
        $this->nif = $nif;
    }

    public function setDireccionCalleF($direccion_calle_f) {
        $this->direccion_calle_f = $direccion_calle_f;
    }

    public function setPostcodeF($postcode_f) {
        $this->postcode_f = $postcode_f;
    }

    public function setCiudadF($ciudad_f) {
        $this->ciudad_f = $ciudad_f;
    }

    public function setDescripcionF($descripcion_f) {
        $this->descripcion_f = $descripcion_f;
    }

    public function setFotoPerfil($foto_perfil) {
        $this->foto_perfil = $foto_perfil;
    }

    public function setTelefonoF($telefono_f) {
        $this->telefono_f = $telefono_f;
    }

    public function setEmailF($email_f) {
        $this->email_f = $email_f;
    }

    public function setPassF($pass_f) {
        $this->pass_f = $pass_f;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setFechaCreaF($fecha_crea_f) {
        $this->fecha_crea_f = $fecha_crea_f;
    }

    public function setFechaModF($fecha_mod_f) {
        $this->fecha_mod_f = $fecha_mod_f;
    }

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

    public function setFechaCreaFoto($fecha_crea_foto) {
        $this->fecha_crea_foto = $fecha_crea_foto;
    }

    public function setFechaModFoto($fecha_mod_foto) {
        $this->fecha_mod_foto = $fecha_mod_foto;
    }

    public function setNombreCat($nombre_cat) {
        $this->nombre_cat = $nombre_cat;
    }
}