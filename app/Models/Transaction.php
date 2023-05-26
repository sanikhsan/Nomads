<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'travel_packages_id',
        'users_id',
        'additional_visa',
        'transaction_total',
        'transaction_status',
        'transaction_image'
    ];
    
    public function TrxTravel(): BelongsTo
    {
        return $this->BelongsTo(TravelPackage::class, 'travel_packages_id');
    }

    public function TrxUser(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'users_id');
    }

    public function TrxDetail(): HasMany
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }
}
