<?php
class Factura
{
    public $id;
    public $cliente_id;
    public $fecha_emision;
    public $fecha_vencimiento;
    public $monto;
    public $pagada;

    public function __construct($cliente_id, $fecha_emision, $fecha_vencimiento, $monto, $pagada)
    {
        $this->cliente_id = $cliente_id;
        $this->fecha_emision = $fecha_emision;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->monto = $monto;
        $this->pagada = $pagada;
    }
}
