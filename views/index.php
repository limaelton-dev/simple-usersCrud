<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD simples de usuários</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- <?php print_r($usersList) ?> -->
    

    <div class="container">
        <div class="row" style="margin-top: 20px;">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-start">
                        <form action="/find" method="post">
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
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <a class="btn btn-secondary" href="/create">Criar Usuário</a>
                </div>
        </div>
    </div>

    <div class="container">
        <div class="row"  style="margin-top: 20px;">
            <div class="col-md-12">
                <ul class="list-group">
                    <?php if (is_array($usersList)): ?>
                        <?php foreach ($usersList as $user): ?>
                            <li class="list-group-item">
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="p-2">ID: <?= $user['id']; ?></div>
                                    <div class="p-2">User: <?= $user['name']; ?></div>
                                    <div class="p-2">E-mail: <?= $user['email']; ?></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="/user_edit" method="put">
                                                <input name="id" type="hidden" value="<?= $user['id']; ?>">
                                                <input class="btn btn-dark" type="submit" value="Editar">
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="/user_delete" method="post">
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