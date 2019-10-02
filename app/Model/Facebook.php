<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    protected $table = 'facebook_accounts';

    protected $fillable = [
        'provider_id',
        'name',
        'email',
    ];
}
