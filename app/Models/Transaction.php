<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tickets';

    public $timestamps = true;

    protected $fillable = [
        'wallet_id',
        'ticket_id'
    ];

    protected array $dates = [
        'created_at',
    ];
}
