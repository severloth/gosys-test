<?php

require_once "Modelo.php";
require_once "HojaDeRuta.php";

class Camion
{
    private Modelo $modelo;
    private string $patente;
    private ?HojaDeRuta $hojaDeRutaActual;

    public function __construct(Modelo $modelo, string $patente)
    {
        $this->modelo = $modelo;
        $this->patente = $patente;
        $this->hojaDeRutaActual = null;
    }

    public function cargarHojaDeRuta(HojaDeRuta $hojaDeRutaActual): void
    {
        $pesoTotal = 0;
        $volumenTotal = 0;
        foreach ($hojaDeRutaActual->getViajes() as $viaje) {
            $pesoTotal += $viaje->calcularPesoTotal();
            $volumenTotal += $viaje->volumenTotal();
        }

        $mensajeExcepcion = "La hoja de ruta supera las capacidades del camión.";
        $mensajeExcepcion .= " Peso total de la hoja de ruta: $pesoTotal kg, Volumen total: $volumenTotal m3.";
        $mensajeExcepcion .= " Capacidad del camión: Peso máximo: {$this->modelo->getPesoMax()} kg, Volumen máximo: {$this->modelo->getVolumenM3()} m3.";

        if ($pesoTotal > $this->modelo->getPesoMax() || $volumenTotal > $this->modelo->getVolumenM3()) {
            throw new Exception($mensajeExcepcion);
        }

        $this->hojaDeRutaActual = $hojaDeRutaActual;
    }

    public function getModelo():Modelo
    {
        return $this->modelo;
    }

    public function getPatente():string
    {
        return $this->patente;
    }

    public function getHojaDeRuta():HojaDeRuta
    {
        return $this->hojaDeRutaActual;
    }

}
