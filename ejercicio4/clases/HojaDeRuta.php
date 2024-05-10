<?php

require_once "Viaje.php";


class HojaDeRuta
{

    private array $viajes = [];

    private array $hojasDeRuta = [];

    /**
     * @param array $viajes Los viajes planificados en la hoja de ruta.
     * @param array $hojasDeRuta Las hojas de ruta asociadas.
     */
    public function __construct(array $viajes = [], array $hojasDeRuta = [])
    {
        $this->setViajes($viajes);
        $this->setHojasDeRuta($hojasDeRuta);
    }

    /**
     * Agrega un viaje a la hoja de ruta.
     *
     * @param Viaje $viaje El viaje a agregar.
     */
    public function agregarViaje(Viaje $viaje): void
    {
        $this->viajes[] = $viaje;
    }

    /**
     * Agrega una hoja de ruta asociada.
     *
     * @param HojaDeRuta $hojaDeRuta La hoja de ruta a agregar.
     */
    public function agregarHojasDeRuta(HojaDeRuta $hojaDeRuta): void
    {
        $this->hojasDeRuta[] = $hojaDeRuta;
    }

    public function getViajes(): array
    {
        return $this->viajes;
    }

    public function getHojasDeRuta(): array
    {
        return $this->hojasDeRuta;
    }

    /**
     * Calcula el costo total de todos los viajes en la hoja de ruta.
     *
     * @return float El costo total de todos los viajes.
     */
    public function calcularCostoTotal(): float
    {
        $costoTotal = 0;
        foreach ($this->viajes as $viaje) {
            $costoTotal += $viaje->calcularCosto();
        }
        return $costoTotal;
    }

    /**
     * @param array $viajes Los viajes planificados en la hoja de ruta.
     * @throws InvalidArgumentException Si algún elemento del array no es un objeto Viaje.
     */
    private function setViajes(array $viajes): void
    {
        foreach ($viajes as $viaje) {
            if (!$viaje instanceof Viaje) {
                throw new InvalidArgumentException("¡Che! El array de viajes solo puede contener objetos de tipo Viaje.");
            }
        }
        $this->viajes = $viajes;
    }

    /**
     * @param array $hojasDeRuta Las hojas de ruta asociadas.
     * @throws InvalidArgumentException Si algún elemento del array no es un objeto HojaDeRuta.
     */
    private function setHojasDeRuta(array $hojasDeRuta): void
    {
        foreach ($hojasDeRuta as $hojaDeRuta) {
            if (!$hojaDeRuta instanceof HojaDeRuta) {
                throw new InvalidArgumentException("¡Che! El array de hojas de ruta solo puede contener objetos de tipo HojaDeRuta.");
            }
        }
        $this->hojasDeRuta = $hojasDeRuta;
    }
}
