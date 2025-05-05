<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class YourExport implements FromCollection
{
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
        dd('headings method called');
        // print_r("headings method called");
        return array_keys($this->data->first()->toArray());

    }
}
