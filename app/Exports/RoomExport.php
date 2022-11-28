<?php

namespace App\Exports;

use App\Models\Room;
use Maatwebsite\Excel\Concerns\FromCollection;

class RoomExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $data = Room::paginate(20);


        $headings = collect([
            [
                "id",
                "branch_id",
                "building_id",
                "floor_no",
                "room_number",
                "name",
                "width",
                "length",
                "benches",
                "seats",
                "ready",
                "created_at",
                "updated_at"
            ]
        ])->union($data);



        return $headings;
    }
}
