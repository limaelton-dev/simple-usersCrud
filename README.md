# Projeto CRUD de Usuários com Setor em PHP

Este é um projeto de um aplicativo CRUD (Create, Read, Update, Delete) de usuários com setores, desenvolvido em PHP, utilizando o PDO para interagir com um banco de dados MySQL. O projeto é construído com o padrão de arquitetura MVC (Model-View-Controller).

Como Renato solicitou, me esforcei muito, desejo entrar para a equipe Coletek e poder mostrar ainda mais meu potencial.

## Requisitos

Antes de começar, certifique-se de que você tenha as seguintes ferramentas e tecnologias instaladas:

- PHP 8.2.9
- MySQL
- Usei o servidor embutido do PHP apontado para a pasta *public/*
- Composer (para gerenciamento de dependências)

## Configuração

1. **Informações gerais**

   # Não esqueça de desativar o modo Safe do MySQL;
   # Caso seja necessário, inicie o composer, ou faça o seu dump;
   # Já deixei anexado no projeto o arquivo composer.json;
   # Também deixei no projeto a pasta vendor;
   # Deixei a configuração do banco diretamente no código por fins de facilidade em app/Database/Connection.php;
   # Para iniciar o projeto, você deve utilizar o comando ;
    ``php -S localhost:8000 -t public/``

   # O projeto possui uma navbar para facilidade de acesso;
   # A página inicial irá possuir uma lista dos usuários cadastrados, com funções de Filtrar por setor, Editar e Excluir.;
   # Quando iniciar o projeto, você pode criar usuário sem setores;
   # Você pode criar ou excluir os setores no menu "Setores";

   # Caso selecione um setor que não possui usuários cadastrados, o filtro irá retornar todos os usuários;
   # Você pode selecionar mais de um setor por vez para filtrar os usuários desses setores;
   # Quando selecionar mais de um setor, o filtro irá retornar os usuários para cada setor selecionado e não para aquele conjunto de setores;
   
