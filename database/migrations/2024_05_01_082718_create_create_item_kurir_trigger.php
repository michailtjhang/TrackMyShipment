<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `create_item_kurir` AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                IF NEW.level IN ("kurir")
                THEN
                    INSERT INTO kurir (nama_kurir) VALUES (NEW.fullname);
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `create_item_kurir`');
    }
};
