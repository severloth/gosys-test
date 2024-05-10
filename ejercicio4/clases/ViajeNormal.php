<?php


class ViajeNormal extends Viaje
{
    public function calcularCosto(): float
    {
        $distancia = $this->calcularDistancia($this->getOrigen()->getLatitud(), $this->getOrigen()->getLongitud(), $this->getDestino()->getLatitud(), $this->getDestino()->getLongitud());
        echo "Distancia: $distancia\n";
        $costo = 2 * $this->calcularPesoTotal() * $distancia;

        return $costo;
    }
}