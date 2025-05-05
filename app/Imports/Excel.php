<?php

namespace App\Imports;

use App\Models\Pin_Code;
use App\Models\Uploaded_pin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Excel implements ToModel, WithHeadingRow
{
    protected $externalData;

    public function __construct($externalData)
    {
        $this->externalData = $externalData;
    }

    public function model(array $row)
    {
        $client = $this->externalData['client'] ?? null;
        $courier = $this->externalData['courier'] ?? null;

        if (
            !isset($row['pincode']) || !isset($row['shortcode']) || !isset($row['valuecapping']) ||
            !isset($row['cod']) || !isset($row['prepaid']) || !isset($row['reversepickup']) ||
            !isset($row['surface']) || !isset($row['air']) || !isset($row['codpriority']) || !isset($row['pppriority'])
        ) {
            return null;
        }

        // Check if data exists in Pin_Code table
        $checking_available = Pin_Code::where('pin_code', $row['pincode'])->count();

        if ($checking_available) {
            // Data exists, so save data in Uploaded_pin
            try {
                $uploadedPin = Uploaded_pin::create([
                    'client' => $client,
                    'courier' => $courier,
                    'pincode' => $row['pincode'],
                    'shortcode' => $row['shortcode'],
                    'valuecappings' => $row['valuecapping'],
                    'cod' => $row['cod'],
                    'prepaid' => $row['prepaid'],
                    'reverse_pickup' => $row['reversepickup'],
                    'surface' => $row['surface'],
                    'air' => $row['air'],
                    'codepriority' => $row['codpriority'],
                    'pppriority' => $row['pppriority'],
                ]);
                return $uploadedPin;
            } catch (\Exception $e) {
                return null;
            }
        }

        // Data doesn't exist in Pin_Code table, so return null
        return null;
    }


}
