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

    /* column name */
    protected string $name;

    /* column role */
    protected string $role;

    /* column difficulty */
    protected string $difficulty;

    /* column free content */
    protected string $free;

    /* column pro content */
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
     * getter splashart
     * @return string
     */
    public function getSplashart(): string
    {
        return $this->splashart;
    }

    /**
     * setter splashart
     * @param string $splashart
     * @return self
     */
    public function setSplashart(string $splashart): self
    {
        $this->splashart = $splashart;
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
     * getter role
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * setter role
     * @param string $role
     * @return self
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    /**
     * getter difficulty
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * setter difficulty
     * @param string $difficulty
     * @return self
     */
    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    /**
     * getter free
     * @return string
     */
    public function getFree(): string
    {
        return $this->free;
    }

    /**
     * setter free
     * @param string $free
     * @return self
     */
    public function setFree(string $free): self
    {
        $this->free = $free;
        return $this;
    }

    /**
     * getter pro
     * @return string
     */
    public function getPro(): string
    {
        return $this->pro;
    }

    /**
     * setter pro
     * @param string $pro
     * @return self
     */
    public function setPro(string $pro): self
    {
        $this->pro = $pro;
        return $this;
    }
}