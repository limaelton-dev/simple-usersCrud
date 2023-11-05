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
                        
                        <div class="col-md-12">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <?php if(isset($setores) && is_array($setores)) : ?>
                                    <? foreach($setores as $setor) :?>

                                        <input type="checkbox" 
                                                class="btn-check" 
                                                name="setor_<?= $setor['id']; ?>" 
                                                id="setor_<?= $setor['id']; ?>" 
                                                autocomplete="off">

                                        <label class="btn btn-outline-primary" 
                                                for="setor_<?= $setor['id']; ?>">
                                                    <?php $setor['name']; ?>
                                        </label>

                                    <? endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- <div class="col-md-12">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="a" autocomplete="off">
                                <label class="btn btn-outline-primary" for="a">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="s" autocomplete="off">
                                <label class="btn btn-outline-primary" for="s">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="d" autocomplete="off">
                                <label class="btn btn-outline-primary" for="d">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="z" autocomplete="off">
                                <label class="btn btn-outline-primary" for="z">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="x" autocomplete="off">
                                <label class="btn btn-outline-primary" for="x">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="c" autocomplete="off">
                                <label class="btn btn-outline-primary" for="c">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="v" autocomplete="off">
                                <label class="btn btn-outline-primary" for="v">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="q" autocomplete="off">
                                <label class="btn btn-outline-primary" for="q">Checkbox 3</label>

                                <input type="checkbox" class="btn-check" id="w" autocomplete="off">
                                <label class="btn btn-outline-primary" for="w">Checkbox 3</label>
                            </div>
                        </div> -->
                        
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