<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedStudent extends Model
{
    use HasFactory;

    protected $table = 'deleted_students';

    public $incrementing = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'password',
        'email',
        'number',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public $timestamps = true;
}
