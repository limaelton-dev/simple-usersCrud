<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
        <div class="container">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="/user/create" method="post">
                    <div class="d-flex justify-content-center align-items-center">
                        <h2>Registrar novo usuário</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" required value="Lima"
                                placeholder="Informe o nome do usuário"/>
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" required value="lima@lima.com"
                                placeholder="Informe o email"/>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <?php if(isset($setores) && is_array($setores)) : ?>
                                    <?php foreach($setores as $setor) :?>
                                        
                                        <input type="checkbox" 
                                                class="btn-check" 
                                                name="setor_<?= $setor['id']; ?>" 
                                                id="setor_<?= $setor['id']; ?>" 
                                                autocomplete="off">

                                        <label class="btn btn-outline-primary" 
                                                for="setor_<?= $setor['id']; ?>">
                                                    <?= $setor['name']; ?>
                                        </label>
                                        
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 d-flex justify-content-end">
                            <input class="btn btn-success" type="submit" value="Enviar" />
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </main>

</body>

</html>