<?php

namespace App;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use Loggable;
    use HasFactory;
    use SoftDeletes, Notifiable, HasApiTokens, HasFactory;

    public $table = 'allocations';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'user_id',
        'user_name',
        'commande_id'
    ];
}
