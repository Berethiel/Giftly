<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Circle
 * 
 * @property int $idCircle
 * @property string $nameCircle
 * @property int $idUser
 *
 * @package App\Models
 */
class Circle extends Model
{
	protected $table = 'circle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idCircle' => 'int',
		'idUser' => 'int'
	];

	protected $fillable = [
		'idCircle',
		'nameCircle',
		'idUser'
	];
}
