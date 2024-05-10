<?php

class ViajePrioritario extends Viaje
{
    /**
     * Calcula el costo del viaje prioritario.
     *
     * @return float El costo del viaje prioritario.
     */
    public function calcularCosto(): float
    {
        $distancia = $this->calcularDistancia($this->getOrigen()->getLatitud(), $this->getOrigen()->getLongitud(), $this->getDestino()->getLatitud(), $this->getDestino()->getLongitud());

        $costo = max(4 * $this->calcularPesoTotal() * $distancia, 10 * $this->volumenTotal() * $distancia);

        return $costo;
    }
}
