<?php

use App\Habitacion;
use PHPUnit\Framework\TestCase;

class HabitacionTest extends TestCase
{
    public function testNumeroCero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El número debe ser positivo");
        new Habitacion(0,'simple', 40);
    }
    
    public function testNumeroNegativo()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El número es negativo");
        new Habitacion(-20,'moderna', 20);
    }
    public function testPrecioCero()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio es igual a cero");
        new Habitacion(40,'simple', 0);
    }
    public function testPrecioNegativo()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El precio es negativo");
        new Habitacion(50,'moderna', -30);
    }
    public function testHabitacionDisponible()
    {
        $habitacion = new Habitacion(50,'moderna', 50);
        $this->assertTrue($habitacion->isDisponible());
    }
    public function testHabitacionnoDisponible()
    {
        $habitacion = new Habitacion(15,'comoda', 30);
        $habitacion->reservar();
        $this->assertFalse($habitacion->isDisponible());
    }
}
