<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_as_product extends Model
{
    use HasFactory;

    protected $table = 'invoice_as_products';

    protected $fillable = [
        'id_invoice',
        'id_product'
    ];
}