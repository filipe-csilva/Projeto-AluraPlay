<?php

namespace Alura\Mvc\Helper;

trait FlashMessageTrait
{
    private function addErrorMessage(string $erroMensage) : void{
        $_SESSION['error_mensage'] = $erroMensage;
    }
}
