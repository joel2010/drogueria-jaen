<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintBook extends Model
{
    use SoftDeletes;

    protected $table = 'complaints_book';

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'legal_representative',
        'address',
        'document_number',
        'email',
        'phone',
        'additional_address',
        'minor',
        'customer_type',

        'good',
        'invoice_number',
        'claimed_amount',
        'good_description',
        'product',

        'complaint_type',
        'complaint_detail',
        'customer_request',
        'supplier_observations',
    ];

    protected $casts = [
        'minor' => 'bool'
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('document_number', 'like', "%{$search}%")
                    ->orWhere('complaint_type', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['customer_type'])) {
            $query->where('customer_type', $filters['customer_type']);
        }

        if (!empty($filters['complaint_type'])) {
            $query->where('complaint_type', $filters['complaint_type']);
        }

        $query->orderBy('created_at', 'desc');

        return $query;
    }
}
