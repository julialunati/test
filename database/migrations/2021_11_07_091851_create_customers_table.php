<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 128);
            $table->string('lastname', 128);
            $table->string('username', 128)->unique();
            $table->string('email', 128)->unique();
            $table->foreignId('address_id')
                ->constrained('addresses')
                ->onUpdate('cascade');
            $table->foreignId('company_id')
                ->nullable()->unsigned()
                ->constrained('companies')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
