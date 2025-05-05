<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BookingB2c;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExportBulkBookingb2c implements ToCollection
{
    /**
     * @param Collection $collection
     */
    protected $externalData;

    public function __construct($externalData)
    {
        $this->externalData = $externalData;
    }

    public function collection(Collection $rows)
    {
        $batchSize = 1000; // Adjust the batch size according to your needs

        $batchData = [];
        $rowCount = 0;
        $firstRow = true;

        foreach ($rows as $row) {
            // Skip the first row
            if ($firstRow) {
                $firstRow = false;
                continue;
            }
            if (count($row) < 24) {
                // Log the error and skip this row
                Log::warning('Row skipped due to insufficient data: ' . json_encode($row));
                continue;
            }
            try {
                $model = new BookingB2c;
                $model->business_type = $this->externalData['business_type'] ?? null;
                $model->order_no = $row[0];
                $model->awb_no = $row[1];
                $model->payment_mode = $row[2];
                $model->item_price = $row[3];
                $model->cod_due = $row[4];
                $model->receiver_name = $row[5];
                $model->receiver_address = $row[6];
                $model->receiver_address_2 = $row[7];
                $model->receiver_state = $row[8];
                $model->receiver_city = $row[9];
                $model->receiver_pincode = $row[10];
                $model->receiver_contactno = $row[11];
                $model->receiver_alt_contactno = $row[12];
                $model->item_sku = $row[13];
                $model->item_name = $row[14];
                $model->item_height = $row[15];
                $model->item_length = $row[16];
                $model->item_weight = $row[17];
                $model->item_Width = $row[17];
                $model->item_qty = $row[19];
                $model->order_type = $row[20];
                $model->client_id = $row[21];
                $model->warehouse_id = $row[22];
                $model->courier_name = $row[23];
                $model->status = "Manifestated";
                // $model->disputed_status = "true";

                // Add the model data to the batch
                $batchData[] = $model->toArray();

                $rowCount++;

                // Insert batch when reaching the batch size or reaching the end of rows
                if ($rowCount % $batchSize === 0 || $rowCount === count($rows) - 1) {
                    // Process the current batch
                    // Insert the batch data into the database
                    BookingB2c::insert($batchData);

                    BookingB2c::bootNullColumnsCheck();
                    BookingB2c::bootpincheck();
                    BookingB2c::disputestatusforcreate();

                    // Clear batch data for the next batch
                    $batchData = [];
                }
            } catch (\Exception $e) {
                // Log the error and continue processing other rows
                Log::error('Error saving data to database: ' . $e->getMessage());
                // Optionally, you can re-throw the exception if you want to halt the execution completely
                // throw $e;
            }
        }


    }
}
