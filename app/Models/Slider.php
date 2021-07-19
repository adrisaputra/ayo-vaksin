<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    // use HasFactory;
    protected $table = 'slider_tbl';
	protected $fillable =['judul','isi','gambar'];
}
