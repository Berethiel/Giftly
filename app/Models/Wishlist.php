<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class List
 * 
 * @property int $id
 * @property string $name_list
 * @property int $user_id
 *
 * @package App\Models
 */

class Wishlist extends Model
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'wishlist';
	protected $primaryKey = 'id';

	protected $casts = [
		'id_user' => 'int'
	];

	protected $fillable = [
		'name_list',
		'user_id'
	];

	public function items()
	{
		return $this->hasMany('App\Models\Item');
	}
	public function user()
	{
		return $this->belongTo('App\Models\User');
	}
}
