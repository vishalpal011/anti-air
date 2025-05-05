<?php

namespace App\Exports\Booking;

use Maatwebsite\Excel\Concerns\FromCollection;

class b2b_reverse implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }
    public function headings(): array
    {

        // print_r("headings method called");
        return array_keys($this->data->first()->toArray());

    }
}
