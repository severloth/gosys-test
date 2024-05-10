<?php

class Paquete
{
    private float $pesoKg;
    private float $altoM;
    private float $anchoM;
    private float $largoM;


    public function __construct(float $pesoKg, float $altoM, float $anchoM, float $largoM)
    {
        $this->pesoKg = $pesoKg;
        $this->altoM = $altoM;
        $this->anchoM = $anchoM;
        $this->largoM = $largoM;

    }

    public function getPeso():float
    {
        return $this->pesoKg;
    }

    public function getAlto():float
    {
        return $this->altoM;
    }

    public function getAncho():float
    {
        return $this->anchoM;
    }

    public function getLargo():float
    {
        return $this->largoM;
    }
}