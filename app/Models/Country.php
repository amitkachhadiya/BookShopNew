<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_code',
        'country_name',
        'status',
    ];

    protected $guarded = [];
    public function userCode(){
        return $this->belongsTo(User::class,'country_id','id');
    }
}
