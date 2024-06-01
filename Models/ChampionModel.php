<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class ChampionModel extends Model
{
    use CreatedAtTrait;

    protected $id;

    /* Image name */
    protected $image;

    /* Image extension */
    protected $extension;

    /* Champion name */
    protected $name;

    /* Champion role */
    protected $role;

    /* Champion Free tips */
    protected $free;

    /* Champion Pro tips */
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
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