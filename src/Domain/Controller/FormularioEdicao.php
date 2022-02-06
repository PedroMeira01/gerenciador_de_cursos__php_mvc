<?php

namespace Alura\Cursos\Domain\Controller;

use Alura\Cursos\Infra\Persistence\ConnectionCreator;
use Alura\Cursos\Infra\Repository\PdoCursoRepository;

class FormularioEdicao implements InterfaceControladorRequisicao
{
    private $repositorio;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->repositorio = new PdoCursoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $titulo = "Editar curso";
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
        }

        $curso = $this->repositorio->find($id);
        require __DIR__."/../../../views/cursos/formulario-curso.php";
    }
}