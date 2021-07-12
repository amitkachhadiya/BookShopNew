<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'state_id',
        'status',
    ];

    protected $guarded = [];
    public function states()
    {
        return $this->belongsToMany(State::class,'id','state_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'city_id','id');
    }
    
}
