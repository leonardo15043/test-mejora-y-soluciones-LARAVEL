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

    public function index()
    {
        $sort = request()->get('sort');
       
        $invoices = $this->invoiceRepository->all($sort);

        return response()->json($invoices);
    }

    public function show(int $id)
    {
        $invoice = $this->invoiceRepository->get($id);

        return response()->json($invoice);
    }

    public function store(Request $request)
    {
        $invoice = new Invoice($request->all());
        $invoice = $this->invoiceRepository->save($invoice);

        return response()->json($invoice);
    }

    public function update(Request $request,int $id)
    {
        $invoice = $this->invoiceRepository->update($request,$id);

        return response()->json($invoice);
    }

    public function destroy(int $id)
    {
        $invoice = $this->invoiceRepository->delete($id);

        return response()->json($invoice);
    }
}
