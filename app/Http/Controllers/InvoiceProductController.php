<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InvoiceProductRepository;
use App\Models\Invoice_as_product;

class InvoiceProductController extends Controller
{
    private $invoiceProductRepository;

    public function __construct(InvoiceProductRepository $invoiceProductRepository)
    {
        $this->invoiceProductRepository = $invoiceProductRepository;
    }

    public function store(Request $request)
    {
        $invoiceProduct = new Invoice_as_product($request->all());
        $invoiceProduct = $this->invoiceProductRepository->save($invoiceProduct);

        return response()->json($invoiceProduct);
    }

    public function unassign(int $id_invoice, int $id_product){
        $invoiceProduct = $this->invoiceProductRepository->destroyAssign($id_invoice, $id_product);

        return response()->json($invoiceProduct);
    }
}
