<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
