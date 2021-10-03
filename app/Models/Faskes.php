<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    // use HasFactory;
	protected $table = 'faskes_tbl';
	protected $fillable =[  'nama_faskes','jumlah_antrian'];


	public function antrian()
	{
	    return $this->belongsTo('App\Models\Antrian');
	}
 
}
