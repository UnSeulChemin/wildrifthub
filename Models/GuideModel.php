<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class GuideModel extends Model
{
    /* creted_at trait */
    use CreatedAtTrait;

    /* id key primary */
    protected int $id;

    /* guide name */
    protected string $name;

    /* guide content */
    protected string $content;

    public function __construct()
    {
        $this->table = "guide";
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}