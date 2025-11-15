<?php

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
        // Change title from VARCHAR(255) to LONGTEXT to accept very long titles (up to 4GB)
        DB::statement('ALTER TABLE products MODIFY title LONGTEXT NOT NULL');
        
        // Change description from TEXT to LONGTEXT to accept very long descriptions (up to 4GB)
        DB::statement('ALTER TABLE products MODIFY description LONGTEXT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert title back to VARCHAR(255)
        DB::statement('ALTER TABLE products MODIFY title VARCHAR(255) NOT NULL');
        
        // Revert description back to TEXT (max 65,535 characters)
        DB::statement('ALTER TABLE products MODIFY description TEXT NULL');
    }
};

