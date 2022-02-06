<?php

namespace Alura\Cursos\Domain\Controller;

use Alura\Cursos\Infra\Persistence\ConnectionCreator;
use Alura\Cursos\Infra\Repository\PdoCursoRepository;
use Alura\Cursos\Domain\Controller\InterfaceControladorRequisicao;

class Exclusao implements InterfaceControladorRequisicao
{
    private $repositorio;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->repositorio = new PdoCursoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
        }

        $this->repositorio->remove($id);

        header('Location: /listar-cursos'); 
    }
}