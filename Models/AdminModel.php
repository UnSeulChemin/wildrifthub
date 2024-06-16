<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class AdminModel extends Model
{
    /* creted_at trait */
    use CreatedAtTrait;

    /* id key primary */
    protected int $id;

    /* admin todo */
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