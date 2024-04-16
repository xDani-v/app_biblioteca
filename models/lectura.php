<?php
class Lectura
{
    public $id;
    public $medidor_id;
    public $fecha_lectura;
    public $lectura;

    public function __construct($medidor_id, $fecha_lectura, $lectura)
    {
        $this->medidor_id = $medidor_id;
        $this->fecha_lectura = $fecha_lectura;
        $this->lectura = $lectura;
    }
}
