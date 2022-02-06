<?php

namespace Alura\Cursos\Infra\Repository;

use PDO;
use Alura\Cursos\Domain\Repository\CursoRepository;
use Alura\Cursos\Domain\Model\Curso;

class PdoCursoRepository implements CursoRepository
{

    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function find($id): array
    {
        $sql = "SELECT * FROM cursos WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $curso = $statement->fetch();
        
        return $curso;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM cursos";
        $statement = $this->connection->query($sql);

        return $this->hydrateListaCursos($statement);
    }

    public function hydrateListaCursos($statement): array
    {
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);
        $cursos = [];

        foreach($dados as $curso) {
            $cursos[] = new Curso(
                $curso['id'],
                $curso['descricao']
            );
        }

        return $cursos;
    }

    public function save(Curso $curso): bool
    {
        if ($curso->id() === null) {
            return $this->insert($curso);
        }
        
        return $this->update($curso);
    }

    public function insert(Curso $curso): bool
    {
        $sql = "INSERT INTO cursos (descricao) VALUES (:descricao);";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':descricao', $curso->descricao());
        $response = $statement->execute();

        $curso->defineId($this->connection->lastInsertId());

        return $response;
    }

    public function update(Curso $curso): bool
    {
        $sql = "UPDATE cursos SET descricao = ?;";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $curso->descricao());
        
        return $statement->execute();
    }

    public function remove($id): bool
    {   
        $sql = "DELETE FROM cursos WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }
}