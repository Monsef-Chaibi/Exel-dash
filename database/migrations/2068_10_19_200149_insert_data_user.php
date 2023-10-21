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
            'name' => 'admin',
            'email' => '',
            'password' => bcrypt('admin123'),
            'role' => '1',
        ]);

        // Add more insert statements as needed
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}


?>
