<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                            <label for="setor">Setor</label>
                            <select class="form-control" name="setor" required placeholder="Informe o setor do usuário">
                                <option value="0">Informe o setor do usuário</option>
                                <option selected value="1">Função 1</option>
                                <option value="2">Função 2</option>
                            </select>
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