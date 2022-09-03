<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_as_product extends Model
{
    use HasFactory;

    protected $table = 'invoice_as_products';

    /**
     * Invoice_as_products entity attributes
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_invoice',
        'id_product',
        'units_product',
        'total_value'
    ];
}
