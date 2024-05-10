<?php


class ViajeNormal extends Viaje
{
    /**
     * Calcula el costo del viaje normal.
     *
     * @return float El costo del viaje normal.
     */
    public function calcularCosto(): float
    {
        $distancia = $this->calcularDistancia($this->getOrigen()->getLatitud(), $this->getOrigen()->getLongitud(), $this->getDestino()->getLatitud(), $this->getDestino()->getLongitud());

        $costo = 2 * $this->calcularPesoTotal() * $distancia;

        return $costo;
    }
}
