<?php


class ViajePrioritario extends Viaje
{
    public function calcularCosto(): float
    {
        $distancia = $this->calcularDistancia($this->getOrigen()->getLatitud(), $this->getOrigen()->getLongitud(), $this->getDestino()->getLatitud(), $this->getDestino()->getLongitud());
        $costo = max(4 * $this->calcularPesoTotal() * $distancia, 10 * $this->volumenTotal() * $distancia);

        return $costo;
    }
}