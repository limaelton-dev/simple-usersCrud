<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php print_r($usersList) ?> -->

    <div>
        <form action="/find" method="post">
            <label for="id">ID do usuário</label>
            <input name ="id" type="text">

            <button type="submit">Buscar</button>

        </form>
    </div>

    <ul>
        <?php if (is_array($usersList)): ?>
            <?php foreach ($usersList as $user): ?>
                <li>
                    <div>
                        <p>User: <?= $user['name']; ?></p>
                        <p>E-mail: <?= $user['email']; ?></p>
                        <p>ID: <?= $user['id']; ?></p>
                        <a href="/userDelete/<?= $user['id']; ?>">X</a>
                    </div>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <a style="margin-bottom: 200px;" href="/create">Criar Usuário</a>
</body>
</html>