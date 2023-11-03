<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php print_r($usersList) ?> -->

    <?php foreach ($usersList as $user): ?>
        <li>
            <div>
                <p>User: <?= $user['name']; ?></p>
                <p>E-mail: <?= $user['email']; ?></p>
                <p>ID: <?= $user['id']; ?></p>
            </div>
        </li>
    <?php endforeach; ?>

    <a style="margin-bottom: 200px;" href="/create">Criar Usuário</a>
</body>
</html>