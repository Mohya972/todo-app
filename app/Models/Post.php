<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // on utilise les factories pour les tests et le seeding
    use HasFactory;

    // on sécurise les champs modifiables en masse
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'published'
    ];

    // on précise les types de certains champs
    protected $casts = [
        'published' => 'boolean',
    ];
}
