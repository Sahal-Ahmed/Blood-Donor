<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    use HasFactory;
    protected $fillable=['id','name','division_id','zone_id'];
    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id');
    }
}
