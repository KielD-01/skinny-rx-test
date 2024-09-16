<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 */
class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message'
    ];

    protected function created_at(): Attribute
    {
        return Attribute::make(
            set: static fn() => Carbon::now()
        );
    }
}
