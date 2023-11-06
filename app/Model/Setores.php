<?php 

declare(strict_types=1);

namespace app\Model;

use PDO;

class Setores extends Model
{
    /**
     * Cria um setor na base
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
     * Busca todos os setores.
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
     * Busca um setor por ID.
     *
     * @param int $id é ID do setor
     *
     * @return bool|array Retorna array com as informaçoes ou false caso não encontre resultados.
     */
    public function findName(int $id): bool|array
    {
        $sql = 'SELECT name FROM setores WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }
}

