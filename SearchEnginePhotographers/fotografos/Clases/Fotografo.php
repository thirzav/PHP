<?php

class Fotografo {
    private $fotografo_id;
    private $nombre_f;
    private $apellido1_f;
    private $apellido2_f;
    private $nombre_empresa;
    private $nif;
    private $direccion_calle;
    private $postcode_f;
    private $ciudad_f;
    private $descripcion_f;
    private $foto_perfil;
    private $telefono_f;
    private $email;
    private $pass_f;
    private $rol;
    private $fecha_crea_f;
    private $fecha_mod_f;

    public function __construct($fotografo_id, $nombre_f, $apellido1_f, $apellido2_f, $nombre_empresa, $nif, $direccion_calle, $postcode_f, $ciudad_f, $descripcion_f, $foto_perfil, $telefono_f, $email, $pass_f, $rol, $fecha_crea_f, $fecha_mod_f) {
        $this->fotografo_id = $fotografo_id;
        $this->nombre_f = $nombre_f;
        $this->apellido1_f = $apellido1_f;
        $this->apellido2_f = $apellido2_f;
        $this->nombre_empresa = $nombre_empresa;
        $this->nif = $nif;
        $this->direccion_calle = $direccion_calle;
        $this->postcode_f = $postcode_f;
        $this->ciudad_f = $ciudad_f;
        $this->descripcion_f = $descripcion_f;
        $this->foto_perfil = $foto_perfil;
        $this->telefono_f = $telefono_f;
        $this->email = $email;
        $this->pass_f = $pass_f;
        $this->rol = $rol;
        $this->fecha_crea_f = $fecha_crea_f;
        $this->fecha_mod_f = $fecha_mod_f;
    }

    // lista de getters

    public function getFotografoId(){
        return $this->fotografo_id;
    }

    public function getNombreF(){
        return $this->nombre_f;
    }

    public function getApellido1F(){
        return $this->apellido1_f;
    }

    public function getApellido2F(){
        return $this->apellido2_f;
    }

    public function getNombreEmpresa() {
        return $this->nombre_empresa;
    }

    public function getNif(){
        return $this->nif;
    }

    public function getCalle(){
        return $this->direccion_calle;
    }

    public function getPostcodeF(){
        return $this->postcode_f;
    }

    public function getCiudadF(){
        return $this->ciudad_f;
    }

    public function getDescripcionF(){
        return $this->descripcion_f;
    }

    public function getFotoPerfil(){
        return $this->foto_perfil;
    }

    public function getTelefonoF(){
        return $this->telefono_f;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassF(){
        return $this->pass_f;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getFechaCreaF(){
        return $this->fecha_crea_f;
    }

    public function getFechaModF(){
        return $this->fecha_mod_f;
    }

    // lista de setters necesarios

    public function setNombreF($nombreF) {
        $this->nombre_f = $nombreF;
    }

    public function setApellido1F($apellido1F) {
        $this->apellido1_f = $apellido1F;
    }

    public function setApellido2F($apellido2F) {
        $this->apellido2_f = $apellido2F;
    }

    public function setNombreEmpresa($nombreEmpresa) {
        $this->nombre_empresa = $nombreEmpresa;
    }

    public function setNif($nif) {
        $this->nif = $nif;
    }

    public function setCalle($calle) {
        $this->direccion_calle = $calle;
    }

    public function setPostcodeF($postcodeF) {
        $this->postcode_f = $postcodeF;
    }

    public function setCiudadF($ciudadF) {
        $this->ciudad_f = $ciudadF;
    }

    public function setDescripcionF($descripcionF) {
        $this->descripcion_f = $descripcionF;
    }

    public function setFotoPerfil($fotoPerfil) {
        $this->foto_perfil = $fotoPerfil;
    }

    public function setTelefonoF($telefonoF) {
        $this->telefono_f = $telefonoF;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassF($passF) {
        $this->pass_f = $passF;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }
}