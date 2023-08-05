<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nisn','nama','hobi','kompetensi','alamat','telepon'];
    protected $table = "siswa";

    public $timestamps = false;
}
