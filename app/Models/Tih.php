<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tih
 * 
 * @property int $id
 * @property string $name
 * @property string $dept
 *
 * @package App\Models
 */
class Tih extends Model
{
	protected $table = 'tih';
	public $timestamps = false;

	protected $fillable = [
		'Name',
		'dept'
	];
}
