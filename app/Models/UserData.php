<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';

    protected $fillable = [
        'foto_user', 'nama_user', 'nomor_abser', 'mulai_masuk', 'catatan_user', 'password_user',
    ];
    // public function  skill(){
    //     return $this->belongsToMany(Skill::class);
    // }
    
}
