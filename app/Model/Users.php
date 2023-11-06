<?php 

declare(strict_types=1);

namespace app\Model;

use PDO;

class Users extends Model
{
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
        $stmt = $this->pdo->prepare('
        SELECT id FROM users
    ');
    
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

      /**
     * Busca um usuario por ID.
     *
     * @param int|array $id é ID do user, ou array de ids ex: [1,4,5]
     *
     * @return bool|array Retorna array com as informaçoes ou false caso não encontre resultados.
     */
    public function find(int|array $ids): bool|array
    {
        $completeQuery = is_array($ids) ? 'users.id IN (' . implode(',', array_fill(0, count($ids), '?')) . ')' : 'users.id = :id';

        $sql = '
            SELECT 
                users.*, 
                GROUP_CONCAT(user_setores.setor_id) as setores
            FROM 
                users
            LEFT JOIN 
                user_setores ON users.id = user_setores.user_id
            WHERE 
                ' . $completeQuery . '
            GROUP BY 
                users.id;
        ';

        $stmt = $this->pdo->prepare($sql);
        
        if (is_array($ids)) {
            $stmt->execute($ids);
            return $stmt->fetchAll();
        }

        $stmt->bindValue(':id', $ids, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function addUserSetores(int $user_id, array $setores)
    {
        $sql = 'INSERT INTO user_setores (setor_id, user_id) VALUES (:setor_id, :user_id)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        foreach ($setores as $setor_id) {
            $stmt->bindValue(':setor_id', $setor_id, PDO::PARAM_INT);
            $stmt->execute();
        }

    }

    /**
     * Ficam vinculados, apenas os setores informados na string
     * 
     * @param int informe o id do usuário
     * @param string informe em uma string, os ids dos setores a serem vinculados
     * Exemplo: ['3,4'] ou [3,] para apenas 1 setor
     * @return bool
     */
    public function updateRelationSetores(int $user_id, string $setores_ids): bool
    {
            $sql = "CALL update_setores_user(:user_id, :setores_id)";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindValue(':setores_id', $setores_ids, PDO::PARAM_STR);

            return $stmt->execute();
    }

    public function findUsersSetores(array $setores)
    {
        $sql = '
            SELECT 
                user_id 
            FROM 
                user_setores 
            WHERE 
                setor_id IN (' . implode(',', array_fill(0, count($setores), '?')) . ')
            GROUP BY
                user_id
        ';

        $stmt = $this->pdo->prepare($sql);
        foreach ($setores as $key => $setor_id) {
            $stmt->bindValue($key + 1, $setor_id, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}

