<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <main>
        <div class="container">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="/user/edit" method="post">
                    <div class="d-flex justify-content-center align-items-center">
                        <h2>Editar usuário</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" required 
                                value="<?= $user['name']; ?>"
                                placeholder="Informe o nome do usuário"/>
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" required 
                                value="<?= $user['email']; ?>"
                                placeholder="Informe o email"/>
                        </div>
                        
                        <div class="col-md-12 border">
                            <?php if(isset($setores) && is_array($setores)) : ?>
                                <div class="form-check form-switch d-flex justify-content-between" style="width:100%">
                                    <?php foreach($setores as $setor) :?>
                                        <div>
                                            <input class="form-check-input" 
                                                    type="checkbox" 
                                                    role="switch"
                                                    id="setor_<?= $setor['id']; ?>"
                                                    name="setor[<?= $setor['id']; ?>]"
                                                    <?= in_array($setor['id'], $user['setores']) ? 'checked' : '' ;?> >
                                            <label class="form-check-label" 
                                                    for="setor_<?= $setor['id']; ?>">
                                                        <?= $setor['name']; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        
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