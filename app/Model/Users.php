<?php 

declare(strict_types=1);

namespace app\Model;

use PDO;

class Users 
{
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * Cria um usuário na base
     * 
     * @param array $fields Um array associativo contendo os campos a serem atualizados.
     *                     Exemplo: ['name' => 'Novo Nome', 'email' => 'novo@email.com']
     *
     * @return int|bool Retorna o ID em caso de sucesso ou false em caso de erro
     */
    public function add(array $fields, ): int|bool
    {
        $sql = 'INSERT INTO users (name, email) VALUES (:name, :email)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':name', $fields['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $fields['email'], PDO::PARAM_STR);

        if($stmt->execute()) {
            return (int) $this->pdo->lastInsertId();
        }

        return false;
    }

    /**
     * Deleta um usuário da base
     * 
     * @param int ID do usuário a ser deletado
     * 
     * @return bool Retorna true em caso de sucesso e false em caso de erro
     */
    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Atualiza os campos do usuário na base.
     *
     * @param array $fields Um array associativo contendo os campos a serem atualizados.
     *                     Exemplo: ['name' => 'Novo Nome', 'email' => 'novo@email.com']
     *
     * @return int|bool Retorna numero de linhas afetadas se a atualização for bem-sucedida, false caso contrário.
     */
    public function update(int $id, array $fields): int|bool
    {
        $sql = 'UPDATE users SET name = :name, email = :email WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $fields['name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $fields['email'], PDO::PARAM_STR);

        if($stmt->execute()) {
            return $stmt->rowCount();
        }

        return false;
    }

    /**
     * Busca todos os usuários.
     *
     * @return array Retorna um array com todos os usuários e todas as suas informações
     */
    public function all(): array
    {
        $usersList = $this->pdo
            ->query('SELECT * FROM users;')
            ->fetchAll();

        return $usersList;
    }

      /**
     * Busca um usuario por ID.
     *
     * @param int $id é ID do user
     *
     * @return bool|array Retorna array com as informaçoes ou false caso não encontre resultados.
     */
    public function find(int $id): bool|array
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

