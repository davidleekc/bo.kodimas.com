<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('channel_user_id')->unique()->after('id');
            $table->string('id_type')->after('last_name');
            $table->string('id_no')->unique()->after('id_type');
            $table->string('nationality')->nullable()->after('email');
            $table->date('dob')->nullable()->after('email');
            $table->string('homeAddress1')->nullable();
            $table->string('homeAddress2')->nullable();
            $table->string('homeState')->nullable();
            $table->string('homeZip')->nullable();
            $table->string('homeTown')->nullable();
            $table->string('homeCountry')->nullable();
            $table->string('mailAddress1')->nullable();
            $table->string('mailAddress2')->nullable();
            $table->string('mailState')->nullable();
            $table->string('mailZip')->nullable();
            $table->string('mailTown')->nullable();
            $table->string('mailCountry')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
