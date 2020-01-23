<?php

declare(strict_types=1);

namespace App\Models\User\DAO;

use App\classes\Database;
use App\Models\User\bean\User;

final class UserDAO extends Database
{
    private $table = "clientes";

    public function __construct()
    {
        parent::__construct();
    }

    public function all(): array
    {
        $list = $this->instance->query("SELECT * FROM " . $this->table);
        $list->execute();

        $users = [];

        foreach($list->fetchAll() as $object) {
            $users[] = self::createUser($object);
        }

        return $users;
    }

    public function findById(int $id): ?User
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id ";
        $find = $this->instance->prepare($sql);
        $find->bindValue('id', $id);
        $find->execute();

        $user = $find->fetch();

        if ( ! $user) {
            return null;
        }

        return self::createUser($user);
    }

    public function create(array $data): bool
    {
        if (!is_array( $data )) {
            $data = (array) $data;
        }
    
        $sql = "INSERT INTO " . $this->table;
        $sql .="(".implode(",", array_keys($data)).")";
        $sql .= "VALUES (:".implode(",:", array_keys($data) ).")";

        $insert = $this->instance->prepare($sql);

        try {
            $created = $insert->execute($data);
            return $created === 1 ? true: false;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function edit(int $id, array $data): bool
    {
        if ( ! is_array($data)) {
            $data = (array) $data;
        }
    
        $dataPrepare = array_map(function($field){
            return "{$field} = :{$field}";
        }, array_keys($data));
    
        $sql = "UPDATE " . $this->table . " SET ";
        $sql.= implode("," , $dataPrepare);
        $sql.= " WHERE id = :id";

        $update = $this->instance->prepare($sql);

        $update->execute(array_merge($data, ['id' => $id]));
    
        return $update->rowCount() === 1 ? true: false;
    }

    public function remove(int $id): bool
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        
        $remove = $this->instance->prepare($sql);
        $remove->bindValue('id', $id);

        $remove->execute();

        return $remove->rowCount() === 1 ? true: false;
    }

    private static function createUser(\stdClass $data): User
    {
        return User::new(
            (int) $data->id,
            $data->nome,
            $data->cpf,
            $data->data_nasc,
            $data->sexo,
            $data->civil,
            $data->email,
            $data->telefone,
            $data->endereco,
            $data->cep
        );
    }
}
