<?php  
    $title = 'Setores';
    require __DIR__ . '/templates/start-html.php'
?>


<body>

    <?php 
        require __DIR__ . '/templates/header.php'
    ?>
    <main>
        <div class="container d-flex justify-content-center align-items-center">
            <h1>Setores</h1>
        </div>
        <div class="container">
            <div class="row">
                <form action="/setor" method="post">
                    <div class="col-md-6">
                        <label class="form-label" for="name">Novo Setor</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <input class="btn btn-success mt-3" type="submit">
                </form>
            </div>
            <div class="row"  style="margin-top: 20px;">
                <div class="col-md-12">
                    <ul class="list-group">
                        <?php foreach ($setoresList as $setor): ?>
                            <li class="list-group-item">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="p-2">
                                        ID: <?= $setor['id']; ?>
                                    </div>
                                    <div class="p-2">
                                        Setor: <?= $setor['name']; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="/setor/delete" method="post">
                                                <input name="id" type="hidden" value="<?= $setor['id']; ?>">
                                                <input class="btn btn-danger" type="submit" value="Excluir">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>

<?php 
    require __DIR__ . '/templates/end-html.php'
?>