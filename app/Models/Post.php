<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'user_id'
    ];

    // Définissez la relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
       return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
