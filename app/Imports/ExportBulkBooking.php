<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Booking;
class ExportBulkBooking implements ToCollection
{
    protected $externalData;

    public function __construct($externalData)
    {
        $this->externalData = $externalData;
    }

    public function collection(Collection $rows)
    {

        $firstRow = true;
        foreach ($rows as $row)
        {

            $business_type = $this->externalData['business_type'] ?? null;
            if ($firstRow)
            {
                $firstRow = false;
                continue;
            }

            $model = new Booking;

            // Assign values to the model attributes based on the corresponding fields
            $model->client_id = $row[0];
            $model->business_type = $business_type;
            $model->warehouse_id = $row[1];
            $model->lr_no = $row[2];
            $model->order_no = $row[3];
            $model->transport_mode = $row[4];
            $model->vendor_name = $row[5];
            $model->cd_no = $row[6];
            $model->edd = $row[7];
            $model->receiver_name = $row[8];
            $model->receiver_address = $row[9];
            $model->receiver_address_2 = $row[10];
            $model->receiver_state = $row[11];
            $model->receiver_city = $row[12];
            $model->receiver_pincode = $row[13];
            $model->receiver_contact_no = $row[14];
            $model->receiver_alt_contact_no = $row[15];
            $model->remarks = $row[16];
            $model->invoice_no = $row[17];
            $model->payment_mode = $row[18];
            $model->item_price = $row[19];
            $model->cod_due = $row[20];
            $model->to_pay = $row[21];
            $model->cash_received = $row[22];
            $model->cft = $row[23];
            $model->item_weight_kg = $row[24];
            $model->item_height_cm = $row[25];
            $model->item_length_cm = $row[26];
            $model->item_width_cm = $row[27];
            $model->receiver_gstin = $row[28];
            $model->invoice_no = $row[29];
            $model->invoice_amount_rs = $row[30];
            $model->e_way_bill = $row[31];
            $model->fragile = $row[32];
            $model->rov_type = $row[33];
            $model->status = "Manifestated";
            $model->channel_name = "Bulk";


            // Save the model to the database
            $model->save();
            Booking::bootNullColumnsCheck();

            Booking::bootpincheck();
            Booking::disputestatusforcreate();
        }
    }
}
