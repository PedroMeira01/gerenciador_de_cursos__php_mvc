<?php 

namespace Alura\Cursos\Domain\Repository;

use Alura\Cursos\Domain\Model\Curso;

interface CursoRepository
{
    public function find($id): array;
    public function findAll(): array;
    public function save(Curso $curso): bool;
    public function remove($id): bool;
}