<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\InvoiceRepository;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * list of invoices
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sort = request()->get('sort');
       
        $invoices = $this->invoiceRepository->all($sort);

        return response()->json($invoices);
    }

    /**
     * Get the invoice corresponding to the id that we pass as a parameter
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $invoice = $this->invoiceRepository->get($id);

        return response()->json($invoice);
    }

    /**
     * Store a newly created invoice in storage.
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice($request->all());
        $invoice = $this->invoiceRepository->save($invoice);

        return response()->json($invoice);
    }

    /**
     * Update the invoice information.
     *
     * @param Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $invoice = $this->invoiceRepository->update($request,$id);

        return response()->json($invoice);
    }

     /**
     * Remove the invoice information.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $invoice = $this->invoiceRepository->delete($id);

        return response()->json($invoice);
    }
}
