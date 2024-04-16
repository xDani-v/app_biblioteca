<?php
class Medidor
{
    public $id;
    public $numero_serie;
    public $tipo;
    public $fecha_instalacion;
    public $cliente_id;

    public function __construct($numero_serie, $tipo, $fecha_instalacion, $cliente_id)
    {
        $this->numero_serie = $numero_serie;
        $this->tipo = $tipo;
        $this->fecha_instalacion = $fecha_instalacion;
        $this->cliente_id = $cliente_id;
    }
}
