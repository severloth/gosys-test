<?php

require_once "Modelo.php";
require_once "HojaDeRuta.php";

class Camion
{
    private Modelo $modelo; 

    private string $patente;

    private ?HojaDeRuta $hojaDeRutaActual;

    /**
     * @param Modelo $modelo El modelo del camión.
     * @param string $patente La patente del camión.
     */
    public function __construct(Modelo $modelo, string $patente)
    {
        $this->modelo = $modelo;
        $this->patente = $patente;
        $this->hojaDeRutaActual = null;
    }

    /**
     * Carga una hoja de ruta en el camión para iniciar un viaje.
     * @param HojaDeRuta $hojaDeRutaActual La hoja de ruta para cargar en el camión.
     * @throws Exception Si la carga excede las capacidades del camión.
     */
    public function cargarHojaDeRuta(HojaDeRuta $hojaDeRutaActual): void
    {
        $pesoTotal = 0;
        $volumenTotal = 0;
        foreach ($hojaDeRutaActual->getViajes() as $viaje) {
            $pesoTotal += $viaje->calcularPesoTotal();
            $volumenTotal += $viaje->volumenTotal();
        }

        $mensajeExcepcion = "¡La carga supera las capacidades del camión, che!";
        $mensajeExcepcion .= " Peso total: $pesoTotal kg, Volumen total: $volumenTotal m3.";
        $mensajeExcepcion .= " Capacidad: Peso máximo: {$this->modelo->getPesoMax()} kg, Volumen máximo: {$this->modelo->getVolumenM3()} m3.";

        if ($pesoTotal > $this->modelo->getPesoMax() || $volumenTotal > $this->modelo->getVolumenM3()) {
            throw new Exception($mensajeExcepcion);
        }

        $this->hojaDeRutaActual = $hojaDeRutaActual;
    }


    public function getModelo(): Modelo
    {
        return $this->modelo;
    }

    public function getPatente(): string
    {
        return $this->patente;
    }

    public function getHojaDeRuta(): ?HojaDeRuta
    {
        return $this->hojaDeRutaActual;
    }
}
