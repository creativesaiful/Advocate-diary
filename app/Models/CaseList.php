<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseList extends Model
{
    protected $guarded = [];  
    use HasFactory;

    
    public function courts(){

        return $this->belongsTo(Court::class, 'court_id', 'id');
    }

}
