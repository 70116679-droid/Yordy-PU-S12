<?php

use App\Reserva;
use App\Cliente;
use App\Habitacion;
use PHPUnit\Framework\TestCase;

class ReservaTest extends TestCase
{
    private $cliente;
    private $habitacion;

    protected function setUp(): void
    {
        $this->cliente = new Cliente('Juan Perez', 'juan@example.com', '123456789');
        $this->habitacion = new Habitacion(101, 'simple', 100.0);
    }

    public function testFechaIngresoInvalida()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha es invalida");
        new Reserva($this->cliente, $this->habitacion, '03/14/2022','30/02/2030');
    }
    public function testFechaIngresoPasado()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de ingreso no puede ser en el pasado");
        new Reserva($this->cliente, $this->habitacion, '04/10/2022','15/11/2030');
    }
    public function testFechaSalidaAnterior()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La fecha de salida es anterior");
        new Reserva($this->cliente, $this->habitacion, '04/10/2026','15/11/1990');
    }
    public function testCalcularTotal()
    {   
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Se puede calcular el Total");
        new Reserva($this->cliente, 50, '01/07/2026', '02/07/2026' );
    }
}
