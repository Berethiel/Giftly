<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @property int $id
 * @property string|null $img_item
 * @property string $name_item
 * @property int $wishlist_id
 * @property string|null $adress_web
 * @property int|null $shop_name
 * @property bool $switch
 * @property int|null $buyer_id
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'Item';
	protected $primaryKey = 'id';

	protected $casts = [
		'id' => 'int',
		'wishlist_id' => 'int',
		'switch' => 'bool'
	];

	protected $fillable = [
		'img_item',
		'name_item',
		'adress_web',
		'shop_name',
		'switch',
		'wishlist_id'
	];

	public function wishlist()
	{
		return $this->belongsTo('App\Models\Wishlist');
	}

	public function buyer()
	{
		return $this->hasOne('App\Models\User');
	}
}
