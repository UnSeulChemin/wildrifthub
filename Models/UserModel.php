<?php
namespace App\Models;

use App\Models\Trait\CreatedAtTrait;

class UserModel extends Model
{
    /* containt created_at */
    use CreatedAtTrait;

    /* key primary id */
    protected int $id;

    /* column email */
    protected string $email;

    /* column password */
    protected string $password;

    /* column pro status */
    protected string $pro;

    /* column roles */
    protected $roles;

    /* magic method __construct */
    public function __construct()
    {
        $this->table = "user";
    }

    /**
     * finder by email
     * @param string $email
     * @return void
     */
    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }

    /**
     * setter session
     * @return void
     */
    public function setSession()
    {
        $_SESSION['user'] = [
            'id' => $this->id,
            'email' => $this->email,
            'pro' => $this->pro,
            'roles' => $this->roles
        ];
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
     * getter email
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * setter email
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * getter password
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * setter password
     * @param string $password
     * @return self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
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

    /**
     * getter roles
     * @return void
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * setter roles
     * @param $roles
     * @param string $method
     * @return void
     */
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