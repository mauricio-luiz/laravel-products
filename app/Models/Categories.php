<?php

namespace ZarbTest\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table      = 'categories';
	protected $primaryKey = 'category_id';
	protected $fillable   = ['name'];

	public function getCreatedAtAttribute($value)
	{
		return date("d/m/Y", strtotime($value));
	}
}
