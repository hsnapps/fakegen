<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class GeneralExport implements FromCollection, WithProperties, WithCustomCsvSettings
{

    public $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Hassan Baabdullah',
            // 'lastModifiedBy' => 'Patrick Brouwers',
            // 'title'          => 'Invoices Export',
            // 'description'    => 'Latest Invoices',
            // 'subject'        => 'Invoices',
            // 'keywords'       => 'invoices,export,spreadsheet',
            // 'category'       => 'Invoices',
            // 'manager'        => 'Patrick Brouwers',
            // 'company'        => 'Maatwebsite',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}
