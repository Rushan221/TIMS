<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'mst_departments';
    protected $guarded = [];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
