<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InvoiceResource;
use App\Http\Resources\v1\InvoiceCollection;
use App\Filters\v1\InvoiceFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\v1\BulkStoreInvoiceRequest;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // return new InvoiceCollection(Invoice::paginate());
        $filter = new InvoiceFilter();
        $queryItems = $filter->transform($request);//['column','operator','value']

        if(count($queryItems) > 0){
            
            $invoices = Invoice::where($queryItems)->paginate();
            // dd($invoices);
            
            return new InvoiceCollection($invoices->appends($request->query()));
        
        }
        else{
            // dd($invoices);
            return new InvoiceCollection(Invoice::paginate());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    public function bulkStore(BulkStoreInvoiceRequest $request){
        $bulk = collect($request->all())->map(function($arr,$key){
            return Arr::except($arr,['customerId','billedDate','paidDate']);
        });

        Invoice::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
