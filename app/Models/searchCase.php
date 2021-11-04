<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class searchCase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function family_members()
    {
        return $this->hasMany(family_members::class,'search_case_id');
    }

    public function family_residences()
    {
        return $this->hasMany(family_residence::class,'search_case_id');
    }

    public function disabilities()
    {
        return $this->hasMany(disabilities::class,'search_case_id');
    }

    public function disabled_note()
    {
        return $this->hasMany(disabled_note::class,'search_case_id');
    }


    public function reproductiveHealth()
    {
        return $this->hasMany(reproductiveHealth::class,'search_case_id');
    }

    public function reproductiveHealth_note()
    {
        return $this->hasMany(reproductive_healths_notes::class,'search_case_id');
    }

    public function family_project()
    {
        return $this->hasMany(family_project::class,'search_case_id');
    }


    public function lending_background()
    {
        return $this->hasMany(lending_background::class,'search_case_id');
    }

    public function social_solidarity()
    {
        return $this->hasMany(social_solidarity::class,'search_case_id');
    }



    public function searchCase_files()
    {
        return $this->hasMany(searchCase_files::class,'search_case_id');
    }
}
