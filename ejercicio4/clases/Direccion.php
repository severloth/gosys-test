<?php

class Direccion
{
    private string $nombreCalle;
    private int $numero;
    private string $codigoPostal;
    private string $pais;
    private string $provincia;
    private string $ciudad;
    private float $latitud;
    private float $longitud;

    public function __construct(string $nombreCalle, int $numero, string $codigoPostal, string $pais, string $provincia, string $ciudad, float $latitud, float $longitud)
    {
        $this->nombreCalle = $nombreCalle;
        $this->numero = $numero;
        $this->codigoPostal = $codigoPostal;
        $this->pais = $pais;
        $this->provincia = $provincia;
        $this->ciudad = $ciudad;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
    }

    public function getNombreCalle():string
    {
        return $this->nombreCalle;
    }

    public function getNumero():int
    {
        return $this->numero;
    }

    public function getCodigoPostal():string
    {
        return $this->codigoPostal;
    }

    public function getPais():string
    {
        return $this->pais;
    }

    public function getProvincia():string
    {
        return $this->provincia;
    }

    public function getCiudad():string
    {
        return $this->ciudad;
    }

    public function getLatitud():float
    {
        return $this->longitud;
    }

    public function getLongitud():float
    {
        return $this->latitud;
    }


}