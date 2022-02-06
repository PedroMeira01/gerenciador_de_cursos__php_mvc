<?php

namespace Alura\Cursos\Domain\Controller;

use Alura\Cursos\Infra\Persistence\ConnectionCreator;
use Alura\Cursos\Infra\Repository\PdoCursoRepository;

class ListarCurso implements InterfaceControladorRequisicao
{

    private $repositorio;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->repositorio = new PdoCursoRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        $cursos = $this->repositorio->findAll();
        $titulo =  'Todos os cursos';

        require __DIR__."/../../../views/cursos/listar-cursos.php";
    }

}