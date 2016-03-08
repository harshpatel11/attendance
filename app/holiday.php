<?php

namespace App;
use DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class holiday extends Eloquent 
{
	protected $collection = 'holiday';

	protected $fillable = [
        'Title', 'Date', 
    ];

}