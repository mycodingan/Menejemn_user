<?php

namespace App\Imports;

use App\Models\UserData;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            return new UserData([
            'foto_user'=>$row[0],       
            'nama_user'=>$row[1],
            'nomor_abser'=>$row[2],
            'mulai_masuk'=>$row[3],
            'catatan_user'=>$row[4],
            'password_user' => Hash::make($row[5]),
        ]);
    }
}
