<?php include __DIR__."/../header.php"; ?>

    <div class="container">
        <div class="jumbotron">
            <h1>Novo Curso</h1>
        </div>
        <form action="/salvar-curso?id=<?= isset($curso) ? $curso['id'] : ''; ?>" method="POST">
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($curso) ? $curso['descricao'] : ''; ?>">
            </div>
            <button class="btn btn-primary">Salvar</button>
        </form>
    </div>

<?php include __DIR__."/../footer.php"; ?>