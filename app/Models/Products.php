<?php

namespace ZarbTest\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table      = 'products';
	protected $primaryKey = 'product_id';
	protected $fillable   = ['category_id', 'name', 'price'];

	public function getCreatedAtAttribute($created_at){
		return date("d/m/Y", strtotime($created_at));
	}

	public function setPriceAttribute($price){
		$price_aux = str_replace('.', '', $price);
		$this->attributes['price'] = str_replace(',', '.', $price_aux);
	}

	public function categories(){
    	return $this->hasOne('ZarbTest\Models\Categories', 'category_id', 'category_id');
    }
}
