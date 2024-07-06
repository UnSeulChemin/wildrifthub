<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class TodoModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* column content */
    protected string $content;

    /* magic method __construct */
    public function __construct()
    {
        $this->table = 'todo';
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
     * getter content
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * setter content
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}