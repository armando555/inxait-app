<?php

namespace App\Exports;

use App\Models\UserInxait;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersInxaitExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UserInxait::all();
    }
}
