<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class ChampionModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* image thumbnail */
    protected string $thumbnail;

    /* image splash-art */
    protected string $splashart;

    /* image extension */
    protected string $extension;

    /* champion name */
    protected string $name;

    /* champion role */
    protected string $role;

    /* champion difficulty */
    protected string $difficulty;

    /* champion free content */
    protected string $free;

    /* champion pro content */
    protected string $pro;

    /* magic method __construct */
    public function __construct()
    {
        $this->table = "champion";
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
     * getter thumbnail
     * @return string
     */
    public function getSplashart(): string
    {
        return $this->splashart;
    }

    /**
     * setter thumbnail
     * @param string $thumbnail
     * @return self
     */
    public function setSplashart(string $splashart): self
    {
        $this->splashart = $splashart;
        return $this;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    public function getFree(): string
    {
        return $this->free;
    }

    public function setFree(string $free): self
    {
        $this->free = $free;
        return $this;
    }

    public function getPro(): string
    {
        return $this->pro;
    }

    public function setPro(string $pro): self
    {
        $this->pro = $pro;
        return $this;
    }
}