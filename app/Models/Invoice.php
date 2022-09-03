<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    /**
     * Invoice entity attributes
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_number',
        'sender_name',
        'sender_nit',
        'receiver_name',
        'receiver_nit',
        'amount',
        'iva',
        'total',
    ];
}
