<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\BookingB2c;
use Illuminate\Support\Facades\Log;

class ExportupdatedBulkBooking implements ToCollection
{
    /**
     * @param Collection $collection
     */


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
            if (count($row) < 25) {
                // Log the error and skip this row
                Log::warning('Row skipped due to insufficient data: ' . json_encode($row));
                continue;
            }
            try {
                 $batchData = [];
                $rowCount = 0;

                foreach ($rows as $row)
                {

                    $dataArray = [
                        'order_no' => $row[0],
                        'business_type' => $row[1],
                        'awb_no' => $row[2],
                        'payment_mode' => $row[3],
                        'item_price' => $row[4],
                        'cod_due' => $row[5],
                        'receiver_name' => $row[6],
                        'receiver_address' => $row[7],
                        'receiver_address_2' => $row[8],
                        'receiver_state' => $row[9],
                        'receiver_city' => $row[10],
                        'receiver_pincode' => $row[11],
                        'receiver_contactno' => $row[12],
                        'receiver_alt_contactno' => $row[13],
                        'item_sku' => $row[14],
                        'item_name' => $row[15],
                        'item_height' => $row[16],
                        'item_length' => $row[17],
                        'item_weight' => $row[18],
                        'item_Width' => $row[19],
                        'item_qty' => $row[20],
                        'order_type' => $row[21],
                        'client_id' => $row[22],
                        'warehouse_id' => $row[23],
                    ];

                    $order_ids[] = $row[0];
                    $batchData[] = $dataArray;

                    $rowCount++;




                    if ($rowCount % $batchSize === 0 || $rowCount === count($rows))
                    {
                        $affectedRows = 0;

                        foreach ($batchData as $data)
                        {
                             $affectedRows += BookingB2c::whereIn('order_no', $order_ids)->update($data);

                        }

                        if ($affectedRows > 0)
                        {
                            $booking_ids = BookingB2c::whereIn('order_no', $order_ids)->pluck('id');

                                foreach ($booking_ids as $booking_id) {
                                    // \Log::info('Successfully updated ' . $booking_id );
                                    BookingB2c::updatebootNullColumnsCheck($booking_id);
                                    // BookingB2c::updatebootpincode($booking_id);
                                    BookingB2c::disputestatus($booking_id);
                                }

                        } else {
                            \Log::info('No rows updated.');
                        }

                        $batchData = [];
                    }

                }


            } catch (\Exception $e) {
                Log::error('Error updating data: ' . $e->getMessage());
            }
        }

    }
}
