<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = 'id';
    public function packages()
    {
        return $this->belongsTo(Packages::class, 'packages_id', 'id');
    }
    protected $table = 'booking';
}
