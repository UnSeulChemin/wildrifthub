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

    /* magic method __construct */
    public function __construct()
    {
        $this->table = "admin";
    }

    /**
     * getter id
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * setter id
     * @param integer $id
     * @return self
     */
    public function setId(int $id): self
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
     * @return self
     */
    public function setTodo(string $todo): self
    {
        $this->todo = $todo;
        return $this;
    }
}