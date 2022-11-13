<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenuOrderings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('menu_sub_orderings')) {
            Schema::create('menu_sub_orderings', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->integer('ordering')->nullable()->default('0');
                $table->foreignUuid('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();          
                $table->foreignUuid('menu_sub_id')->nullable()->constrained('menu_subs')->cascadeOnDelete();   
                $table->foreignUuid('parent_menu_sub_id')->nullable()->constrained('menu_subs')->cascadeOnDelete();   
                $table->foreignUuid('menu_id')->constrained('menus')->onDelete('cascade');       
                $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();      
                $table->timestamps();
                $table->softDeletes();         
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
        Schema::dropIfExists('menu_sub_orderings');
    }
}
