<?php

require_once "Viaje.php";

class HojaDeRuta
{
    private array $viajes = [];
    private array $hojasDeRuta = [];

    public function __construct(array $viajes = [], array $hojasDeRuta = [])
    {
        $this->setViajes($viajes);
        $this->setHojasDeRuta($hojasDeRuta);
    }

    public function agregarViaje(Viaje $viaje): void
    {
        $this->viajes[] = $viaje;
    }

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

    private function setViajes(array $viajes): void
    {
        foreach ($viajes as $viaje) {
            if (!$viaje instanceof Viaje) {
                throw new InvalidArgumentException("El array de viajes solo puede contener objetos de tipo Viaje.");
            }
        }
        $this->viajes = $viajes;
    }

    private function setHojasDeRuta(array $hojasDeRuta): void
    {
        foreach ($hojasDeRuta as $hojaDeRuta) {
            if (!$hojaDeRuta instanceof HojaDeRuta) {
                throw new InvalidArgumentException("El array de hojas de ruta solo puede contener objetos de tipo HojaDeRuta.");
            }
        }
        $this->hojasDeRuta = $hojasDeRuta;
    }

    public function calcularCostoTotal(): float
    {
        $costoTotal = 0;
        foreach ($this->viajes as $viaje) {
            $costoTotal += $viaje->calcularCosto();
        }
        return $costoTotal;
    }
}