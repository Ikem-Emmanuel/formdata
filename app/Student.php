<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['lastname', 'firstname','middlename', 'class', 'date_of_birth','degree', 'department','faculty','university_name','admission_year', 'graduation_year'];
    public $timestamps = false;

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
