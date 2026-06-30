<?php

namespace App;

class Habitacion
{
    private int $numero;
    private string $tipo;
    private float $precio;
    private bool $disponible;

    public function __construct(int $numero, string $tipo, float $precio)
    {
        if ($numero == 0) {
            throw new \InvalidArgumentException("El número debe ser positivo");
        }
        
        if ($numero < 0) {
            throw new \InvalidArgumentException("El número es negativo");
        }
        
        if ($precio == 0) {
            throw new \InvalidArgumentException("El precio es igual a cero");
        }
        
        if ($precio < 0) {
            throw new \InvalidArgumentException("El precio es negativo");
        }
        
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->disponible = true;
    }

    public function reservar(): void
    {
        $this->disponible = false;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
}
