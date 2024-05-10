<?php

class Modelo
{
    private string $nombreModelo;
    private float $volumenM3;
    private float $pesoMax;

    public function __construct(string $nombreModelo, float $volumenM3, float $pesoMax)
    {
        $this->nombreModelo = $nombreModelo;
        $this->volumenM3 = $volumenM3;
        $this->pesoMax = $pesoMax;

    }

    public function getNombreModelo():string
    {
        return $this->nombreModelo;
    }

    public function getVolumenM3():float
    {
        return $this->volumenM3;
    }

    public function getPesoMax():float
    {
        return $this->pesoMax;
    }


}
