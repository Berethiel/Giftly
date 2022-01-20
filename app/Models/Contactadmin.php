<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Contactadmin
 * 
 * @property int $idSender
 * @property string $emailSender
 * @property string $messageContent
 *
 * @package App\Models
 */
class Contactadmin extends Model
{
	protected $table = 'contactadmin';
	protected $primaryKey = 'idSender';
	public $timestamps = false;

	protected $fillable = [
		'emailSender',
		'messageContent'
	];
}
