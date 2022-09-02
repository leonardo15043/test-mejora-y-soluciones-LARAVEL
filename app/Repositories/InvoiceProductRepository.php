<?php

namespace App\Repositories;

use App\Models\Invoice_as_product;

class InvoiceProductRepository extends BaseRepository
{
    public function __construct(Invoice_as_product $invoiceProduct)
    {
        parent::__construct($invoiceProduct);
    }

    public function destroyAssign(int $id_invoice, int $id_product){
        return $this->model->where('id_invoice',$id_invoice)->where('id_product',$id_product)->delete();
    }

}