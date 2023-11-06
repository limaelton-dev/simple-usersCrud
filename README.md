# Projeto CRUD de Usuários com Setor em PHP

Este é um projeto de um aplicativo CRUD (Create, Read, Update, Delete) de usuários com setores, desenvolvido em PHP, utilizando o PDO para interagir com um banco de dados MySQL. O projeto é construído com o padrão de arquitetura MVC (Model-View-Controller).

**Como solicitado, me esforcei muito, desejo entrar para a equipe Coletek e poder mostrar todo meu potencial.**

## Requisitos

- PHP 8.2.9
- MySQL
- Usei o servidor embutido do PHP apontado para a pasta *public/*
- Composer (para importar o autoload e utilizar a proteção CSRF com a PSR-4)
- A estrutura do banco, é exatamente a mesma solicitada no TESTE

- **Deixei anexado o arquivo SQL.md contendo os scripts usados para o DB**

## Configuração
   - Não esqueça de executar as triggers e a procedure antes de iniciar o projeto para o correto funcionamento
   - Não esqueça de desativar o modo Safe do MySQL caso necessário;
   - Não é necessário iniciar o composer, mas caso tenha problemas inicie o composer, ou faça o seu dump;
   - Já deixei anexado no projeto o arquivo ``composer.json``;
   - Também deixei no projeto a pasta vendor;
   - Deixei a configuração do banco diretamente no código por fins de facilidade em ``app/Database/Connection.php``;
   - Para iniciar o projeto, você deve utilizar o comando ;
    ``php -S localhost:8000 -t public/``

## Informações gerais do projeto

   - O projeto possui uma navbar para facilidade de acesso;
   - A página inicial irá possuir uma lista dos usuários cadastrados, com funções de Filtrar por setor, Editar e Excluir.;
   - Quando iniciar o projeto, você pode criar usuário sem setores;
   - Você pode criar ou excluir os setores no menu "Setores";

   - Caso selecione um setor que não possui usuários cadastrados, o filtro irá retornar todos os usuários;
   - Você pode selecionar mais de um setor por vez para filtrar os usuários desses setores;
   - Quando selecionar mais de um setor, o filtro irá retornar os usuários para cada setor selecionado e não para aquele conjunto de setores;

    - A procedure *update_setores_user* irá atualizar os setores vinculados ao usuário informado. Ela irá deixar na tabela user_setores, apenas os setores informados como parâmetro para a mesma.

    - A trigger *delete_user_setores* irá deletar todos os registros de um usuário, quando o mesmo for deletado da tabela *users*.

    - A trigger *delete_setores_users* irá deletar todos os registros que contém vínculo com usuários da tabela *user_setores*, quando o setor for deletado da tabela *users*.

## Commits

    [É possível verificar meu histórico de commits no repositório publico em meu github acessando:]
    (https://github.com/limaelton-dev/simple-usersCrud)


   
