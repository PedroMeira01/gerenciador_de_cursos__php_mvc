<?php

namespace Alura\Cursos\Domain\Controller;

use Alura\Cursos\Domain\Model\Curso;
use Alura\Cursos\Infra\Persistence\ConnectionCreator;
use Alura\Cursos\Infra\Repository\PdoCursoRepository;

class Persistencia
{
    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->repositorio = new PdoCursoRepository($pdo);
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
        $curso = new Curso(
            null,
            $descricao
        );

        if (!is_null($id) || $id !== false) {
           $curso->defineId($id);
        }

        $this->repositorio->save($curso);

        header('Location: /listar-cursos');
        exit();
    }
}