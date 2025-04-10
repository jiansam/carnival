<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Sign extends BaseModel
{
	use HasDateTimeFormatter;
	protected $fillable = array('*');
}
