<?php


class ViajeDevolucion extends Viaje
{
    /**
     * @var float La tarifa del viaje de devolución.
     */
    private float $tarifa = 1000;

    /**
     * Calcula el costo del viaje de devolución.
     *
     * @return float El costo del viaje de devolución.
     */
    public function calcularCosto(): float
    {
        return $this->tarifa;
    }

    public function getTarifa(): float
    {
        return $this->tarifa;
    }

    /**
     * En caso de querer cambiar la tarifa del viaje de devolución.
        * @param float $tarifa La nueva tarifa del viaje de devolución.
     */

    public function setTarifa(float $tarifa): void
    {
        $this->tarifa = $tarifa;
    }
}
