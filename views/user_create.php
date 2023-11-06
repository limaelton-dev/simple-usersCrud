<?php  
    $title = 'Usuários';
    require __DIR__ . '/templates/start-html.php'
?>


<body>

    <?php 
        require __DIR__ . '/templates/header.php'
    ?>
    <main>
        <div class="container">
            <div class="col-md-12 d-flex justify-content-center">
                <form action="/user/create" method="post">
                    <div class="d-flex justify-content-center align-items-center">
                        <h1>Registrar novo usuário</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="name">Nome</label>
                            <input class="form-control" type="text" name="name" required
                                placeholder="Informe o nome do usuário"/>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" required
                                placeholder="Informe o email"/>
                        </div>
                        
                        <div class="col-md-12">
                            <?php if(isset($setores) && is_array($setores)) : ?>
                                <?php foreach($setores as $setor) :?>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" 
                                                class="form-check-input"
                                                role="switch"
                                                name="setor[<?= $setor['id']; ?>]; ?>" 
                                                id="setor_<?= $setor['id']; ?>">
                                        <label class="form-check-label" 
                                                for="setor_<?= $setor['id']; ?>">
                                                    <?= $setor['name']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
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

<?php 
    require __DIR__ . '/templates/end-html.php'
?>