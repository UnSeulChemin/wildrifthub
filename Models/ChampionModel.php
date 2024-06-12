<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class ChampionModel extends Model
{
    use CreatedAtTrait;

    /* id key primary */
    protected $id;

    /* image thumbnail */
    protected $thumbnail;

    /* image splash-art */
    protected $splashart;

    /* image extension */
    protected $extension;

    /* champion name */
    protected $name;

    /* champion role */
    protected $role;

    /* champion difficulty */
    protected $difficulty;

    /* champion Free tips */
    protected $free;

    /* champion Pro tips */
    protected $pro;

    public function __construct()
    {
        $this->table = "champion";
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

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function getSplashart()
    {
        return $this->splashart;
    }

    public function setSplashart($splashart)
    {
        $this->splashart = $splashart;
        return $this;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function setExtension($extension)
    {
        $this->extension = $extension;
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

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getDifficulty()
    {
        return $this->difficulty;
    }

    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    public function getFree()
    {
        return $this->free;
    }

    public function setFree($free)
    {
        $this->free = $free;
        return $this;
    }

    public function getPro()
    {
        return $this->pro;
    }

    public function setPro($pro)
    {
        $this->pro = $pro;
        return $this;
    }
}