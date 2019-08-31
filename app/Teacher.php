<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'tbl_teachers';
    protected $guarded = [];

    public function departments()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
}
