<?php

class Paquete
{
    
    private float $pesoKg;

    private float $altoM;

    private float $anchoM;

    private float $largoM;

    /**
     * Construye un paquete con el peso, alto, ancho y largo proporcionados.
     *
     * @param float $pesoKg El peso del paquete en kilogramos.
     * @param float $altoM La altura del paquete en metros.
     * @param float $anchoM El ancho del paquete en metros.
     * @param float $largoM El largo del paquete en metros.
     */
    public function __construct(float $pesoKg, float $altoM, float $anchoM, float $largoM)
    {
        $this->pesoKg = $pesoKg;
        $this->altoM = $altoM;
        $this->anchoM = $anchoM;
        $this->largoM = $largoM;
    }


    public function getPeso(): float
    {
        return $this->pesoKg;
    }

    public function getAlto(): float
    {
        return $this->altoM;
    }

    public function getAncho(): float
    {
        return $this->anchoM;
    }
    
    public function getLargo(): float
    {
        return $this->largoM;
    }
}
