<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

                                   // Specify the table name
    protected $table = 'students'; // Use 'students' since that's the table name

                                  // Specify the primary key
    protected $primaryKey = 'id'; // Assuming 'id' is the primary key

                                 // If your primary key is not an incrementing integer, set this to false
    public $incrementing = true; // Assuming 'id' is an auto-incrementing integer

    protected $fillable = [
        'first_name', 'last_name', 'password', 'email', 'number',
    ];

                               // Enable timestamps if you have created_at and updated_at columns
    public $timestamps = true; // Set to true since you have created_at and updated_at columns

}
