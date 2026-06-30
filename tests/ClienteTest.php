<?php

use App\Cliente;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase

{
    public function testNombreVacio()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El nombre no puede estar vacío");
        new Cliente('','serpa@mail.co','123459245');
    }
    public function testEmailInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El email es invalido");
        new Cliente(14, 'yordy_ñ@com.pe','984563215');
    }
}
