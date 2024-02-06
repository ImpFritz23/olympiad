<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Flight extends Model{
    
    use HasFactory;

    public function scopeRetrieveUser(){

        $result = DB::select('SELECT * FROM user');
            
        return $result;
    }

}