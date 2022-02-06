<?php

namespace Alura\Cursos\Domain\Model;

class Curso
{
    private ?int $id;
    private string $descricao;

    public function __construct(?int $id, string $descricao)
    {
        $this->id = $id;
        $this->descricao = $descricao;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function defineId(int $id): void
    {
        $this->id = $id;
    }

    public function descricao(): string
    {
        return $this->descricao;
    }

    public function defineDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}
