<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CaseDate extends Model
{
    protected $guarded = [];  
    use HasFactory;

    public function case(){

        return $this->belongsTo(CaseList::class, 'case_id');
    }
}
