<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class InvoiceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        // $data = [];
        // foreach ($this->collection as $invoice) {
        //     $data[] = [
        //         'id' => $invoice->id,
        //         'customerId' => $invoice->customer_id,
        //         'amount' => $invoice->amount,
  
        //     ];
        // }
        // return $data;
        return parent::toArray($request);
    }
}
