<?php

require_once "./clases/Camion.php";
require_once "./clases/Modelo.php";
require_once "./clases/Paquete.php";
require_once "./clases/Direccion.php";
require_once "./clases/ViajeNormal.php";
require_once "./clases/ViajePrioritario.php";
require_once "./clases/ViajeDevolucion.php";
require_once "./clases/HojaDeRuta.php";

echo "<h1> Test de flujo del sistema de envíos Flash</h1>";

$modeloCamion = new Modelo("Modelo1", 10, 1000); 
$camion = new Camion($modeloCamion, "ABC123");

echo "Modelo del camión: " . $camion->getModelo()->getNombreModelo();
echo "<br>";
echo "Patente del camión: " . $camion->getPatente();

echo "<br>";
echo "<br>";
echo "<br>";



$paquete1 = new Paquete(10, 1, 1, 1);
$paquete2 = new Paquete(20, 1, 1, 1);

echo "Peso del paquete 1: " . $paquete1->getPeso() . " kg";
echo "<br>";
echo "Volumen del paquete 1: " . $paquete1->getAlto() * $paquete1->getAncho() * $paquete1->getLargo() . " m3";

echo "<br>";
echo "<br>";

echo "Peso del paquete 2: " . $paquete2->getPeso() . " kg";
echo "<br>";
echo "Volumen del paquete 2: " . $paquete2->getAlto() * $paquete2->getAncho() * $paquete2->getLargo() . " m3";

echo "<br>";
echo "<br>";


$direccionOrigen = new Direccion("Calle1", 1500, 1663, "Argentina", "Buenos Aires", "San Miguel", -34.63097620842236, -58.39332775984775);
$direccionDestino = new Direccion("Calle2", 1200, 1665, "Argentina", "Buenos Aires", "Muñiz", -31.435493709354144, -64.18581343330024);

$viajeNormal = new ViajeNormal([$paquete1, $paquete2], $direccionOrigen, $direccionDestino);
$viajePrioritario = new ViajePrioritario([$paquete1, $paquete2], $direccionOrigen, $direccionDestino);
$viajeDevolucion = new ViajeDevolucion([$paquete1, $paquete2], $direccionOrigen, $direccionDestino);

$costoViajeNormal = $viajeNormal->calcularCosto();
$costoViajePrioritario = $viajePrioritario->calcularCosto();
$costoViajeDevolucion = $viajeDevolucion->calcularCosto();

echo "<br>";
echo "Costo del viaje normal: $" . $costoViajeNormal;
echo "<br>";
echo "Costo del viaje prioritario: $" .$costoViajePrioritario;
echo "<br>";
echo "Costo del viaje devolución: $".$costoViajeDevolucion;

$hojaDeRuta = new HojaDeRuta();
$hojaDeRuta->agregarViaje($viajeNormal);
$hojaDeRuta->agregarViaje($viajePrioritario);
$hojaDeRuta->agregarViaje($viajeDevolucion);
echo "<br>";

try {
    $camion->cargarHojaDeRuta($hojaDeRuta);
    echo " La hoja de ruta se cargó exitosamente en el camión. ";

    $costoTotalHojaDeRuta = $hojaDeRuta->calcularCostoTotal();

    echo "Costo total de la hoja de ruta: $" . $costoTotalHojaDeRuta;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

