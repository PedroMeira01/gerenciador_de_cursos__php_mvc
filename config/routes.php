<?php

use Alura\Cursos\Domain\Controller\{
    Exclusao,
    ListarCurso,
    Persistencia,
    FormularioInsercao,
    FormularioEdicao
};

$rotas = [
    '/listar-cursos' => ListarCurso::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusao::class,
    '/editar-curso' => FormularioEdicao::class
];

return $rotas;