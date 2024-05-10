<?php


class ViajeDevolucion extends Viaje
{
    private float $tarifa = 1000;

    public function getTarifa():float
    {
        return $this->tarifa;
    }

    public function setTarifa(float $tarifa):void
    {
        $this->tarifa = $tarifa;
    }

    public function calcularCosto(): float
    {
        return $this->tarifa;
    }
}