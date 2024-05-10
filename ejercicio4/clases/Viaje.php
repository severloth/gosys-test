<?php

require_once "Paquete.php";
require_once "Direccion.php";

abstract class Viaje
{
    private array $paquetes;
    private Direccion $origen;
    private Direccion $destino;
    private float $distancia;

    public function __construct(array $paquetes, Direccion $origen, Direccion $destino)
    {
        foreach ($paquetes as $paquete) {
            if (!$paquete instanceof Paquete) {
                throw new InvalidArgumentException("El array de paquetes solo puede contener objetos de tipo Paquete.");
            }
        }

        $this->paquetes = $paquetes;
        $this->origen = $origen;
        $this->destino = $destino;
    }

    abstract public function calcularCosto(): float;

    protected function calcularDistancia(float $latitudOrigen, float $longitudOrigen, float $latitudDestino, float $longitudDestino): float
    {
        $theta = $longitudOrigen - $longitudDestino;
        $distance = (sin(deg2rad($latitudOrigen)) * sin(deg2rad($latitudDestino))) + (cos(deg2rad($latitudOrigen)) * cos(deg2rad($latitudDestino)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        return round($distance, 2);
    }

    public function calcularPesoTotal(): float
    {
        $pesoTotal = 0;
        foreach ($this->paquetes as $paquete) {
            $pesoTotal += $paquete->getPeso();
        }
        return $pesoTotal;
    }

    public function volumenTotal(): float
    {
        $volumenTotal = 0;
        foreach ($this->paquetes as $paquete) {
            $volumenTotal += $paquete->getAlto() * $paquete->getAncho() * $paquete->getLargo();
        }
        return $volumenTotal;
    }


    public function getPaquetes(): array
    {
        return $this->paquetes;
    }

    public function getOrigen(): Direccion
    {
        return $this->origen;
    }

    public function getDestino(): Direccion
    {
        return $this->destino;
    }

    public function getDistancia(): float
    {
        return $this->distancia;
    }
}
