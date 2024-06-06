<?php
namespace App\Models;

use App\Core\Database;

class Model extends Database
{
    private $db;
    protected $table;

    /**
     * model->find($id)
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        $query = $this->requete("SELECT * FROM {$this->table} WHERE id = $id");
        return $query->fetch();
    }

    /**
     * model->findName($name)
     * @param string $name
     * @return void
     */
    public function findName(string $name)
    {
        $query = $this->requete("SELECT * FROM {$this->table} WHERE name = '$name'");
        return $query->fetch();
    }

    /**
     * model->findBy(['key' => $value])
     * @param array $targets
     * @return void
     */
    public function findBy(array $targets)
    {
        $fields = [];
        $values = [];

        foreach ($targets as $field => $value)
        {
            $fields[] = "$field = ?";
            $values[] = $value;
        }

        $list_fields = implode(' AND ', $fields);

        $query = $this->requete("SELECT * FROM {$this->table} WHERE $list_fields", $values);
        return $query->fetchAll();
    }

    /**
     * model->findAll();
     * @return void
     */
    public function findAll()
    {
        $query = $this->requete("SELECT * FROM " . $this->table);
        return $query->fetchAll();
    }

    /**
     * model->findAllOrderBy('id DESC')
     * @param string $orderBy
     * @return void
     */
    public function findAllOrderBy(string $orderBy)
    {
        $query = $this->requete("SELECT * FROM {$this->table} ORDER BY $orderBy");
        return $query->fetchAll();
    }

    /**
     * model->findAllOrderByLimit('id DESC', 6);
     * @param string $orderBy
     * @param integer $limit
     * @return void
     */
    public function findAllOrderByLimit(string $orderBy, int $limit)
    {
        $query = $this->requete("SELECT * FROM {$this->table} ORDER BY $orderBy LIMIT $limit");
        return $query->fetchAll();
    }

    /**
     * crud : create
     * @return void
     */
    public function create()
    {
        $fields = [];
        $inter = [];
        $values = [];

        foreach ($this as $field => $value)
        {
            if ($value !== null && $field != 'db' && $field != 'table')
            {
                $fields[] = $field;
                $inter[] = "?";
                $values[] = $value;
            }
        }

        $list_fields = implode(', ', $fields);
        $list_inter = implode(', ', $inter);

        $query = $this->requete('INSERT INTO '.$this->table.' ('. $list_fields.')VALUES('.$list_inter.')', $values);
        return $query;
    }

    /**
     * crud : update
     * @return void
     */
    public function update()
    {
        $fields = [];
        $values = [];

        foreach ($this as $field => $value)
        {
            if ($value !== null && $field != 'db' && $field != 'table')
            {
                $fields[] = "$field = ?";
                $values[] = $value;
            }
        }
        $values[] = $this->id;

        $list_fields = implode(', ', $fields);

        $query = $this->requete('UPDATE '.$this->table.' SET '. $list_fields.' WHERE id = ?', $values);
        return $query;
    }

    /**
     * crud : delete
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        $query = $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        return $query;
    }

    /**
     * hydrate datas
     * @param $datas
     * @return void
     */
    public function hydrate($datas)
    {
        foreach ($datas as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * requete
     * @param string $sql
     * @param array|null $attributes
     * @return void
     */
    public function requete(string $sql, array $attributes = null)
    {
        $this->db = Database::getInstance();

        if ($attributes !== null)
        {
            $query = $this->db->prepare($sql);
            $query->execute($attributes);
            return $query;
        }

        else
        {
            return $this->db->query($sql);
        }
    }
}