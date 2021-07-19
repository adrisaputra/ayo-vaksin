<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    // use HasFactory;
	protected $table = 'antrian_tbl';
	protected $fillable =[  'nik',
                            'nama',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'alamat',
                            'pekerjaan',
                            'tempat_kerja',
                            'no_hp',
                            'vaksin_ke',
                            'no_tiket',
                            'tanggal_vaksin_pertama',
                            'faskes',
                            'status',
                            'tanggal',
                            'no_urut',
                            'user_id' ];
}
