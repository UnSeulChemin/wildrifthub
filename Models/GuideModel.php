<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class GuideModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* image thumbnail */
    protected string $thumbnail;

    /* image extension */
    protected string $extension;

    /* column name */
    protected string $name;

    /* column content */
    protected string $content;

    /* magic method __construct */
    public function __construct()
    {
        $this->table = "guide";
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
     * getter thumbnail
     * @return string
     */
    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * setter thumbnail
     * @param string $thumbnail
     * @return self
     */
    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * getter extension
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * setter extension
     * @param string $extension
     * @return self
     */
    public function setExtension(string $extension): self
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * getter name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * setter name
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
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