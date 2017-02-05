<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function addTeacher(Teacher $teacher)
    {
        $this->teachers()->save($teacher);
    }
}
