<?php

require_once "Paquete.php";
require_once "Direccion.php";

/**
 * La hice clase abstracta debido a que no se va a instanciar directamente, sino que se va a instanciar a través de sus clases hijas.
 */
abstract class Viaje
{

    private array $paquetes;

    private Direccion $origen;

    private Direccion $destino;

    private float $distancia;

    /**
     * Construye un viaje con los paquetes, dirección de origen y dirección de destino proporcionados.
     *
     * @param array $paquetes El conjunto de paquetes a transportar en el viaje.
     * @param Direccion $origen La dirección de origen del viaje.
     * @param Direccion $destino La dirección de destino del viaje.
     * @throws InvalidArgumentException Si algún elemento del array no es un objeto Paquete.
     */
    public function __construct(array $paquetes, Direccion $origen, Direccion $destino)
    {
        foreach ($paquetes as $paquete) {
            if (!$paquete instanceof Paquete) {
                throw new InvalidArgumentException("¡Che! El array de paquetes solo puede contener objetos de tipo Paquete.");
            }
        }

        $this->paquetes = $paquetes;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->distancia = $this->calcularDistancia($origen->getLatitud(), $origen->getLongitud(), $destino->getLatitud(), $destino->getLongitud());
    }

    /**
     * Método abstracto para calcular el costo del viaje. Este método lo hice abstracto para que las clases hijas lo implementen.
     *
     * @return float El costo del viaje.
     */
    abstract public function calcularCosto(): float;

    /**
     * Calcula la distancia entre dos puntos geográficos en linea recta en kilómetros.
     *
     * @param float $latitudOrigen La latitud del punto de origen.
     * @param float $longitudOrigen La longitud del punto de origen.
     * @param float $latitudDestino La latitud del punto de destino.
     * @param float $longitudDestino La longitud del punto de destino.
     * @return float La distancia en kilómetros en linea recta entre los dos puntos.
     */
    protected function calcularDistancia(float $latitudOrigen, float $longitudOrigen, float $latitudDestino, float $longitudDestino): float
    {
        $theta = $longitudOrigen - $longitudDestino;
        $distance = (sin(deg2rad($latitudOrigen)) * sin(deg2rad($latitudDestino))) + (cos(deg2rad($latitudOrigen)) * cos(deg2rad($latitudDestino)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        $distance = $distance * 1.609344;
        return round($distance, 2);
    }

    /**
     * Calcula el peso total de los paquetes en el viaje.
     *
     * @return float El peso total de los paquetes en el viaje.
     */
    public function calcularPesoTotal(): float
    {
        $pesoTotal = 0;
        foreach ($this->paquetes as $paquete) {
            $pesoTotal += $paquete->getPeso();
        }
        return $pesoTotal;
    }

    /**
     * Calcula el volumen total de los paquetes en el viaje.
     *
     * @return float El volumen total de los paquetes en el viaje.
     */
    public function volumenTotal(): float
    {
        $volumenTotal = 0;
        foreach ($this->paquetes as $paquete) {
            $volumenTotal += $paquete->getAlto() * $paquete->getAncho() * $paquete->getLargo();
        }
        return $volumenTotal;
    }

    public function getPaquetes(): array
    {
        return $this->paquetes;
    }

    public function getOrigen(): Direccion
    {
        return $this->origen;
    }

    public function getDestino(): Direccion
    {
        return $this->destino;
    }

    public function getDistancia(): float
    {
        return $this->distancia;
    }
}
