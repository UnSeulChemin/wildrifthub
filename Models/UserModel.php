<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class UserModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* user email */
    protected string $email;

    /* user password */
    protected string $password;

    /* user pro status */
    protected string $pro;

    /* user roles */
    protected $roles;

    public function __construct()
    {
        $this->table = "user";
    }

    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }

    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'email' => $this->email,
            'pro' => $this->pro,
            'roles' => $this->roles
        ];
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
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

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles, string $method = "decode")
    {
        if ($method == "encode")
        {
            $this->roles = json_encode($roles);
            return $this;
        }

        if ($method == "decode")
        {
            $this->roles = json_decode($roles);
            return $this;
        }
    }
}