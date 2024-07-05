<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    protected $table = 'password_reset_tokens';

    // Define the fillable fields if necessary
    protected $fillable = [
        'email', 'token', 'created_at'
    ];

    // Optional: Specify if timestamps are used in the table
    public $timestamps = false;
}
