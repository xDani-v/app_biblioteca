
<?php
class Cliente
{
    public $id;
    public $nombre;
    public $direccion;
    public $telefono;
    public $email;

    public function __construct($id, $nombre, $direccion, $telefono, $email)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
    }
}
