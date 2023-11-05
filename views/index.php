<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD simples de usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- <?php print_r($usersList) ?> -->
    

    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center justify-content-start">
                            <form action="/user" method="get">
                                <div class="row align-items-end">
                                    <div class="col-md-8">
                                        <label for="id" class="form">ID do usuário</label>
                                        <input class="form-control" name="id" type="text">
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row d-flex justify-content-end align-items-end">
                            <div class="col-md-4 d-flex justify-content-end align-items-end">
                                <a class="btn btn-secondary" href="/setor/create">Criar Setor</a>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end align-items-end">
                                <label for=""></label>
                                <a class="btn btn-success" href="/user/create">Criar Usuário</a>
                            </div>
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
                                        ID: <?= $user['id']; ?>
                                    </div>
                                    <div class="p-2">
                                        User: <?= $user['name']; ?>
                                    </div>
                                    <div class="p-2">
                                        E-mail: <?= $user['email']; ?>
                                    </div>
                                    <div class="p-2">
                                        Setor: SETOR
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
</html>