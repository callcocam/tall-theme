<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('menu_subs')) {
            Schema::table('menu_subs', function (Blueprint $table) {
                if(!Schema::hasColumn('menu_subs','menu_sub_id')){
                    $table->foreignUuid('menu_sub_id')->nullable()->constrained('menu_subs')->cascadeOnDelete(); 
                }    
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
};
