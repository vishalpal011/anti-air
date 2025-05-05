<?php

namespace App\Exports\Booking;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class error_b2c implements FromCollection, WithHeadings
{
    private $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
             'Order No',
            'Business Type',
            'AWB No',
            'Payment Mode',
            'Item Price',
            'COD Due',
            'Receiver Name',
            'Receiver Address',
            'Receiver Address 2',
            'Receiver State',
            'Receiver City',
            'Receiver Pincode',
            'Receiver Contact No',
            'Receiver Alt Contact No',
            'Item SKU',
            'Item Name',
            'Item Height',
            'Item Length',
            'Item Weight',
            'Item Width',
            'Item Qty',
            'Order Type',
            'Client ID',
            'Warehouse ID',
            'Response'
        ];

    }
}
