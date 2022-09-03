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

    /**
     * Store a newly created invoice product in storage.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoiceProduct = new Invoice_as_product($request->all());
        $invoiceProduct = $this->invoiceProductRepository->save($invoiceProduct);

        return response()->json($invoiceProduct);
    }

     /**
     * Remove item from invoice
     *
     * @param int $id_invoice
     * @param int $id_product
     * @return \Illuminate\Http\Response
     */
    public function unassign(int $id_invoice, int $id_product)
    {
        $invoiceProduct = $this->invoiceProductRepository->destroyAssign($id_invoice, $id_product);

        return response()->json($invoiceProduct);
    }
}
