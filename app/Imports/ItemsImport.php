<?php

namespace App\Imports;

use App\Models\Items;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Items([
            'image_one' => $row['image_one'],
            'image_two' =>  $row['image_two'],
            'image_three' =>  $row['image_three'],
            'title' =>  $row['title'],
            'title_ar' =>  $row['title_ar'],
            'weight' => $row['weight'],
            'code' =>  $row['code'],
            'commission_id' => $row['commission_id'],
            'category_id' =>  $row['category_id'],
            'caliber_id' =>  $row['caliber_id'],
            'collection_id'  => $row['collection_id'],
            'sets_id'  => $row['sets_id'],
            'item_price' =>  $row['item_price'],
            'status' => $row['status'],
        ]);
    }
    public function rules(): array
    {
        return [
            'image_one' => 'required',

            // Above is alias for as it always validates in batches
            '*.image_one' => 'required',
            'image_two' => '',
            // Above is alias for as it always validates in batches
            '*.image_two' => '',
            'image_three' => '',
            // Above is alias for as it always validates in batches
            '*.image_three' => '',
            'code' => 'unique:items',
        ];
    }
}
