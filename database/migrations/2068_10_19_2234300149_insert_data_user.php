<?php

use App\Http\Middleware\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'password' => bcrypt('test123'),
            'role' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'monsef',
            'password' => bcrypt('monsef123'),
            'role' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'observe',
            'password' => bcrypt('observe123'),
            'role' => '3',
        ]);
        DB::table('users')->insert([
            'name' => 'qwerty',
            'password' => bcrypt('qwerty123'),
            'role' => '4',
        ]);


        //  Add more insert statements as needed
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}


?>
