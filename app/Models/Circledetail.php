<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Circledetail
 * 
 * @property int $idCircle
 * @property int $idContact
 *
 * @package App\Models
 */
class Circledetail extends Model
{
	protected $table = 'circledetail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idCircle' => 'int',
		'idContact' => 'int'
	];

	protected $fillable = [
		'idCircle',
		'idContact'
	];
}
