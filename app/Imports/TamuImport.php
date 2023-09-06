<?php

namespace App\Imports;

use App\Models\Tamu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TamuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    var $tenant_id;
    public function  __construct($tenant_id)
    {
        $this->tenant_id= $tenant_id;
    }
    public function model(array $row)
    {
        return new Tamu([
            //
            'nama'     => $row['nama'],
            'no_whatsapp'    => $row['no_whatsapp'],
            'tenant_id' => $this->tenant_id
        ]);
    }
}
