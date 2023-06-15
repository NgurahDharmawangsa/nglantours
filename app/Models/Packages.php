<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Packages extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function destination(): BelongsToMany

    {
        return $this->belongsToMany(Destination::class, 'destination_packages', 'packages_id', 'destination_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'packages_id', 'id');
    }
    protected $table = 'packages';
}
