<?php 

declare(strict_types=1);

namespace app\Model;

use PDO;

class Setores extends Model
{
    /**
     * Cria um usuário na base
     * 
     * @param array $fields Um array associativo contendo os campos e seus valores.
     *                     Exemplo: ['name' => 'Novo Setor']
     *
     * @return int|bool Retorna o ID em caso de sucesso ou false em caso de erro
     */
    public function add(array $fields, ): int|bool
    {
        $sql = 'INSERT INTO setores (name) VALUES (:name)';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':name', $fields['name'], PDO::PARAM_STR);

        if($stmt->execute()) {
            return (int) $this->pdo->lastInsertId();
        }

        return false;
    }

    /**
     * Deleta um setor da base
     * 
     * @param int ID do setor a ser deletado
     * 
     * @return bool|int Retorna número de linhas afetas em caso de sucesso e false em caso de erro
     */
    public function remove(int $id): bool|int
    {
        $sql = 'DELETE FROM setores WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute() ? $stmt->rowCount() : false;
    }

    /**
     * Atualiza os campos do usuário na base.
     *
     * @param array $fields Um array associativo contendo os campos a serem atualizados.
     *                     Exemplo: ['name' => 'Setor atualizado']
     *
     * @return int|bool Retorna numero de linhas afetadas se a atualização for bem-sucedida, false caso contrário.
     */
    public function update(int $id, array $fields): int|bool
    {
        $sql = 'UPDATE setores SET name = :name WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $fields['name'], PDO::PARAM_STR);

        if($stmt->execute()) {
            return $stmt->rowCount();
        }

        return false;
    }

    /**
     * Busca todos os usuários.
     *
     * @return array Retorna um array com todos os setores
     */
    public function all(): array
    {
        $setores = $this->pdo
            ->query('SELECT * FROM setores;')
            ->fetchAll();

        return $setores;
    }

      /**
     * Busca um usuario por ID.
     *
     * @param int $id é ID do setor
     *
     * @return bool|array Retorna array com as informaçoes ou false caso não encontre resultados.
     */
    public function find(int $id): bool|array
    {
        $sql = 'SELECT * FROM setores WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}

