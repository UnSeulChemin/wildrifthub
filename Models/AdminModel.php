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

    /* magic methods */
    public function __construct()
    {
        $this->table = "admin";
    }

    /* getter id */
    public function getId()
    {
        return $this->id;
    }

    /* setter id */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * getter todo
     * @return string
     */
    public function getTodo(): string
    {
        return $this->todo;
    }

    /**
     * setter todo
     * @param string $todo
     * @return void
     */
    public function setTodo(string $todo)
    {
        $this->todo = $todo;
        return $this;
    }
}