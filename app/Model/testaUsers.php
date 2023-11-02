<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use app\Database\Connection;
use app\Model\Users;

$pdo = Connection::getConnection();


$usersModel = new Users($pdo);

// $addSuccess = $usersModel->add(['name' => 'Novo Usuário', 'email' => 'novo@usuario.com']);
// if ($addSuccess) {
//     echo "Usuário $addSuccess adicionado com sucesso!";
// } else {
//     echo "Erro ao adicionar o usuário.";
// }

// $users = $usersModel->all();
// if (!empty($users)) {
//     echo "Usuários encontrados" . "\n";
//     foreach ($users as $user) {
//         echo "ID: " . $user['id'] . ", Nome: " . $user['name'] . ", Email: " . $user['email'] . "\n";
//     }
// } else {
//     echo "Nenhum usuário encontrado.";
// }


// $userId = 3; 
// $userInfo = $usersModel->find($userId);
// if ($userInfo) {
//     echo "Informações do usuário com ID $userId:"."\n";
//     echo "ID: " . $userInfo['id'] . ", Nome: " . $userInfo['name'] . ", Email: " . $userInfo['email'];
// } else {
//     echo "Nenhum usuário encontrado com o ID $userId.";
// }


// $userId = 3; 
// $userInfo = $usersModel->remove(3);
// if ($userInfo) {
//     echo "informação $userInfo:"."\n";
// } else {
//     echo "Nenhum usuário encontrado com o ID $userId.";
// }

// $fields = [
//     'name' => 'Elton',
//     'email' => 'elton@elton.com'
// ];

// $id = 4;

// $result = $usersModel->update($id, $fields);

// if ($result !== false) {
//     if ($result > 0) {
//         echo "Atualizou com sucesso. Linhas afetadas: $result"."\n";
//     } else {
//         echo "Nenhum usuário foi atualizado. O ID $id não foi encontrado ou não teve mudanças."."\n";
//     }
// } else {
//     echo "Erro ao executar a atualização."."\n";
// }



?>