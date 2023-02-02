<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $token
 */
class Admin extends \Illuminate\Foundation\Auth\User
{
    protected $guarded = [];
}
