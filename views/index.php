<?php  
    $title = 'Usuários';
    require __DIR__ . '/templates/start-html.php'
?>


<body>

    <?php 
        require __DIR__ . '/templates/header.php'
    ?>
    <div class="d-flex justify-content-center align-items-center">
        <h1>Usuários</h1>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-start">
                            <form action="/filtrar" method="post">
                                <div class="row align-items-end">
                                    <div class="col-md-8">
                                        <label class="form-label" class="form">Setor</label>
                                        <select class="form-select" name="setores[]" multiple aria-label="Multiple select example">
                                            <option value="0">Todos</option>
                                            <?php foreach($setoresList as $setor): ?>
                                                <option value="<?= $setor['id']; ?>"><?= $setor['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row"  style="margin-top: 20px;">
            <div class="col-md-12">
                <ul class="list-group">
                    <?php if (isset($usersList) && is_array($usersList)): ?>
                        <?php foreach ($usersList as $user): ?>
                            <li class="list-group-item">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="p-2">
                                        <strong>ID:</strong> <?= $user['id']; ?>
                                    </div>
                                    <div class="p-2">
                                        <strong>User:</strong> <?= $user['name']; ?>
                                    </div>
                                    <div class="p-2">
                                        <strong>E-mail:</strong> <?= $user['email']; ?>
                                    </div>
                                    <div class="p-2">
                                        <ul>
                                            <!-- <?php var_dump(!empty($user['setores_name'])); ?> -->
                                            <?php if(is_array($user['setores_name']) && (!empty($user['setores_name']))) : ?>
                                            

                                                <?php foreach($user['setores_name'] as $setor) : ?>
                                                    <li><strong>Setor: </strong><?= $setor ;?></li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="/user/edit" method="get">
                                                <input name="id" type="hidden" value="<?= $user['id']; ?>">
                                                <input class="btn btn-dark" type="submit" value="Editar">
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="/user/delete" method="post">
                                                <input name="id" type="hidden" value="<?= $user['id']; ?>">
                                                <input class="btn btn-danger" type="submit" value="Excluir">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</body>

<?php 
    require __DIR__ . '/templates/end-html.php'
?>