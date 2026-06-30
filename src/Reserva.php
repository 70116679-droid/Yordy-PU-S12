<?php

namespace App;

class Reserva
{
    private $cliente;
    private $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct($cliente, $habitacion, string $fechaIngreso, string $fechaSalida)
    {
        $d1 = \DateTime::createFromFormat('d/m/Y', $fechaIngreso);
        $d2 = \DateTime::createFromFormat('d/m/Y', $fechaSalida);

        if (!$d1 || $d1->format('d/m/Y') !== $fechaIngreso) {
            throw new \InvalidArgumentException("La fecha es invalida");
        }

        $now = new \DateTime('now');
        if ($d1 < $now) {
            throw new \InvalidArgumentException("La fecha de ingreso no puede ser en el pasado");
        }

        if (!$d2 || $d2 < $d1) {
            throw new \InvalidArgumentException("La fecha de salida es anterior");
        }

        if (!is_object($habitacion) || !method_exists($habitacion, 'getPrecio')) {
            throw new \InvalidArgumentException("Se puede calcular el Total");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function calcularTotal(): float
    {
        $dias = 1;
        if (is_object($this->habitacion) && method_exists($this->habitacion, 'getPrecio')) {
            return $dias * $this->habitacion->getPrecio();
        }

        throw new \InvalidArgumentException("Se puede calcular el Total");
    }
}
