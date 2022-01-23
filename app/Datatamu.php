<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datatamu extends Model
{
    protected $fillable = ['nama','instansi','nohp','alamat','keperluan','pegawaitujuan','suhutubuh'];
    protected $table = 'datatamus';
    use SoftDeletes;
}
