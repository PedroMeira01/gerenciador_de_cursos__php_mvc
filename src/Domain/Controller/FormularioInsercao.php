<?php

namespace Alura\Cursos\Domain\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{

    public function processaRequisicao(): void
    {
        $titulo = "Novo curso";
        require __DIR__."/../../../views/cursos/formulario-curso.php";
    }
}