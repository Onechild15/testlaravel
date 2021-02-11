<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shark extends Model
{
	public $timestamps = false;
	
	protected $connection = 'odbc';
	
	protected $table = 'DV@CABLIB.IDKPGKT';
	
	protected $fillable = ['KODPGKT', 'NAMAPGKT', 'BILREK'];
    //
}
