<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tickets';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'code',
        'type',
        'show_id'
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function shows(): HasOne
    {
        return $this->hasOne(Show::class, 'show_id');
    }
}
