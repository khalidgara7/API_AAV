<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableRole extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
