<?php 

class Cliente {
    private $client_id;
    private $rol;
    private $pass;
    private $nombre_c;
    private $apellido1_c;
    private $apellido2_c;
    private $email;
    private $telefono;
    private $direccion_calle;
    private $postcode;
    private $ciudad;
    private $fecha_crea_c;
    private $fecha_mod_c;

    public function __construct($client_id, $rol, $pass, $nombre_c, $apellido1_c, $apellido2_c, $email, $telefono, $direccion_calle, $postcode, $ciudad, $fecha_crea_c, $fecha_mod_c) {
        $this->client_id = $client_id;
        $this->rol = $rol;
        $this->pass = $pass;
        $this->nombre_c = $nombre_c;
        $this->apellido1_c = $apellido1_c;
        $this->apellido2_c = $apellido2_c;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion_calle = $direccion_calle;
        $this->postcode = $postcode;
        $this->ciudad = $ciudad;
        $this->fecha_crea_c = $fecha_crea_c;
        $this->fecha_mod_c = $fecha_mod_c;
    }

    // lista de getters

    public function getClientId(){
        return $this->client_id;
    }
    
    public function getRol(){
        return $this->rol;
    }
    
    public function getPass(){
        return $this->pass;
    }

    public function getNombreC(){
        return $this->nombre_c;
    }

    public function getApellido1C(){
        return $this->apellido1_c;
    }

    public function getApellido2C(){
        return $this->apellido2_c;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getCalle(){
        return $this->direccion_calle;
    }

    public function getPostcode(){
        return $this->postcode;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function getFechaCreaC(){
        return $this->fecha_crea_c;
    }

    public function getFechaModC(){
        return $this->fecha_mod_c;
    }

    // lista de setters necesarios

    public function setNombre($nombre) {
        $this->nombre_c = $nombre;
    }
    
    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    public function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setTelefonoF($telefono) {
        $this->telefono = $telefono;
    }

    public function setCalle($calle) {
        $this->direccion_calle = $calle;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

}