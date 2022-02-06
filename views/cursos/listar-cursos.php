<?php include __DIR__."/../header.php"; ?>

    <div class="container">
        <div class="jumbotron">
            <h1>Listar cursos</h1>
            <a href="/novo-curso" class="btn btn-primary mb-2">
                Novo Curso
            </a>
        </div>
        <ul class="list-group">
            <?php foreach ($cursos as $curso): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <?= $curso->descricao(); ?>
                    <span>
                        <a href="/editar-curso?id=<?= $curso->id(); ?>" class="btn btn-info btn-sm">
                            Editar
                        </a>
                        <a href="/excluir-curso?id=<?= $curso->id(); ?>" class="btn btn-danger btn-sm">
                            Excluir
                        </a>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php include __DIR__."/../footer.php"; ?>