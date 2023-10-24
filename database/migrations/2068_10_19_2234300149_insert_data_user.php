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
            'role' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'monsef',
            'password' => bcrypt('monsef123'),
            'role' => '0',
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
