<?php
namespace App\Models\Trait;

Trait CreatedAtTrait
{
    protected $created_at;

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }
}