<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Area;
use App\Http\Models\Room;
use App\Http\Models\RoomRegistration;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        


        $areas = [
            ['B1', 400000],
            ['B2', 300000],
            ['B3', 200000]
        ];
        foreach($areas as $area => $value):
        $add_area[] = [
            'area_name' => $value[0],
            'area_cost' => $value[1]
        ];
        endforeach;
        DB::table('areas')->insert($add_area);
        
        
        $rooms = [
            [101, 1, 3, 3, 'nam'],
            [102, 1, 0, 3, 'nam'],
            [103, 1, 0, 3, 'nam'],
            [104, 1, 0, 3, 'nam'],
            [105, 1, 0, 3, 'nam'],
            [201, 1, 0, 3, 'nu'],
            [202, 1, 0, 3, 'nu'],
            [203, 1, 0, 3, 'nu'],
            [204, 1, 0, 3, 'nu'],
            [205, 1, 0, 3, 'nu'],
            [301, 1, 0, 3, 'nu'],
            [302, 1, 0, 3, 'nu'],
            [303, 1, 0, 3, 'nu'],
            [304, 1, 0, 3, 'nu'],
            [305, 1, 0, 3, 'nu'],
            [401, 1, 0, 3, 'nam'],
            [402, 1, 0, 3, 'nam'],
            [403, 1, 0, 3, 'nam'],
            [404, 1, 0, 3, 'nam'],
            [405, 1, 0, 3, 'nam'],
            [101, 2, 0, 4, 'nu'],
            [102, 2, 0, 4, 'nu'],
            [103, 2, 0, 4, 'nu'],
            [104, 2, 0, 4, 'nu'],
            [105, 2, 0, 4, 'nu'],
            [201, 2, 0, 4, 'nu'],
            [202, 2, 0, 4, 'nu'],
            [203, 2, 0, 4, 'nu'],
            [204, 2, 0, 4, 'nu'],
            [205, 2, 0, 4, 'nu'],
            [301, 2, 0, 4, 'nu'],
            [302, 2, 0, 4, 'nu'],
            [303, 2, 0, 4, 'nu'],
            [304, 2, 0, 4, 'nu'],
            [305, 2, 0, 4, 'nu'],
            [401, 2, 0, 4, 'nu'],
            [402, 2, 0, 4, 'nu'],
            [403, 2, 0, 4, 'nu'],
            [404, 2, 0, 4, 'nu'],
            [405, 2, 0, 4, 'nu'],
            [101, 3, 0, 6, 'nam'],
            [102, 3, 0, 6, 'nam'],
            [103, 3, 0, 6, 'nam'],
            [104, 3, 0, 6, 'nam'],
            [105, 3, 0, 6, 'nam'],
            [201, 3, 0, 6, 'nam'],
            [202, 3, 0, 6, 'nam'],
            [203, 3, 0, 6, 'nam'],
            [204, 3, 0, 6, 'nam'],
            [205, 3, 0, 6, 'nam'],
            [301, 3, 0, 6, 'nam'],
            [302, 3, 0, 6, 'nam'],
            [303, 3, 0, 6, 'nam'],
            [304, 3, 0, 6, 'nam'],
            [305, 3, 0, 6, 'nam'],
            [401, 3, 0, 6, 'nam'],
            [402, 3, 0, 6, 'nam'],
            [403, 3, 0, 6, 'nam'],
            [404, 3, 0, 6, 'nam'],
            [405, 3, 0, 6, 'nam']
        ];
        foreach($rooms as $room => $value2):
        $add_rooms[] = [
            'room_number' => $value2[0],
            'area_id' => $value2[1],
            'current_numbers' => $value2[2],
            'max_numbers' => $value2[3],
            'gender' => $value2[4]
        ];
        endforeach;
        DB::table('rooms')->insert($add_rooms);
        
    }
}
