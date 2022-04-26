<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_belakang', 'nama_ibu', 'nama_ayah', 'jenis_kelamin', 'agama', 'alamat','avatar'];

    public function getAvatar(){
        if(!$this->avatar){
            return asset ('images/default.jpg');
        }
        return asset ('images/'.$this->avatar);
    }
}
