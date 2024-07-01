<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class AdminModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* column todo */
    protected string $todo;

    public function __construct()
    {
        $this->table = "admin";
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTodo()
    {
        return $this->todo;
    }

    public function setTodo($todo)
    {
        $this->todo = $todo;
        return $this;
    }
}