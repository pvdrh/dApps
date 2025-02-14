<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Show extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'shows';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'duration',
        'image_url',
        'description',
        'start_time',
        'total_ticket',
        'category_id'
    ];

    protected array $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categories (): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
