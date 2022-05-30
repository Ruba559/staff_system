<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactU extends Model
{
    use HasFactory;
    protected $table = 'contact_u_s';
    protected $fillable = [
        'name', 'email', 'message',
    ];
}
