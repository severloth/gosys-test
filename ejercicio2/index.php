<?php

$ejemploDestinos1 = [
  [
    "nombre" => "America", 
    "hijos" => [
      [
        "nombre" => "Argentina",
        "hijos" => [
          [
            "nombre" => "Buenos Aires", 
            "hijos" => [
              [
                "nombre" => "Pilar",
                "hijos" => [["nombre" => "Manzanares"]]
              ]
            ]
          ],
          ["nombre" => "Córdoba"]
        ],
      ],
      [
        "nombre" => "Venezuela",
        "hijos" => [
          ["nombre" => "Caracas"],
          ["nombre" => "Vargas"]
        ]
      ]
    ]
  ]
];

$ejemploDestinos2 = [
  [
    "nombre" => "America", 
    "hijos" => [
      [
        "nombre" => "Argentina",
        "hijos" => [
          ["nombre" => "Buenos Aires"],
          ["nombre" => "Córdoba"],
          ["nombre" => "Santa Fe"]
        ],
      ],
      [
        "nombre" => "EEUU",
        "hijos" => [
          ["nombre" => "Arizona"],
          ["nombre" => "Florida"]
        ]
      ]
    ]
  ],
  [
      "nombre" => "Europa",
      "hijos" => [
          ["nombre" => "España"],
          ["nombre" => "Italia"],
      ]
  ]
];

class NodoDestino
{
    public $nombre;
    public $hijos;
    
    public function __construct($nombre, $hijos = [])
    {
        $this->nombre = $nombre;
        $this->hijos = $hijos;
    }
}

function buscarDestinos($destinos, $substring)
{
    $coincidencias = [];
    foreach ($destinos as $destino) {
        if (stripos($destino['nombre'], $substring) !== false) {
            $coincidencias[] = $destino['nombre'];
        }
        if (!empty($destino['hijos'])) {
            $coincidenciasHijos = buscarDestinos($destino['hijos'], $substring);
            foreach ($coincidenciasHijos as $coincidenciaHijo) {
                $coincidencias[] = $coincidenciaHijo;
            }
        }
    }
    return $coincidencias;
}

$coincidencias = buscarDestinos($ejemploDestinos1, "ar");
foreach ($coincidencias as $coincidencia) {
    echo $coincidencia . "<br>";
}