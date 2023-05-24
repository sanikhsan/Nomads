<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'location',
        'about',
        'featured_event',
        'language',
        'foods',
        'departured_date',
        'duration',
        'type',
        'price'
    ];

    // Relasi untuk mengembalikan satu gambar yang pertama
    public function Gallery(): BelongsTo {
        return $this->belongsTo(PackageGalleries::class, 'id');
    }

    // Relasi untuk mengembalikan banyak gambar
    public function Galleries(): HasMany {
        return $this->hasMany(PackageGalleries::class, 'travel_packages_id', 'id');
    }
}
