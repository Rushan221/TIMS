<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'mst_subjects';
    protected $guarded = [];

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
