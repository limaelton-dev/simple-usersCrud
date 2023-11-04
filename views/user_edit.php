<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuário</title>
</head>

<body>
    <main>
        <div class="container">
            
        </div>
        <form action="/create" method="post">
            <h2>Registrar novo usuário</h3>
                <div>
                    <label for="name">Nome</label>
                    <input type="text" name="name" required value="Lima"
                        placeholder="Informe o nome do usuário"/>
                </div>
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" required value="lima@lima.com"
                        placeholder="Informe o email"/>
                </div>
                <div>
                    <label for="setor">Setor</label>
                    <select name="setor" required placeholder="Informe o setor do usuário">
                        <option value="0">Informe o setor do usuário</option>
                        <option selected value="1">Função 1</option>
                        <option value="2">Função 2</option>
                    </select>
                </div>
                <input type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>