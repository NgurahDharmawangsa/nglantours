<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'image' => 'array' // atau 'json'
    ];

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Packages::class, 'destination_packages', 'destination_id', 'packages_id');
    }

    protected $table = 'destination';
}
