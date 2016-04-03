<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('email',150);
            $table->string('password',250);
            $table->dateTime('updated_at');
            $table->dateTime('started_at')->nullable()->default(null);
            $table->dateTime('ended_at')->nullable()->default(null);
            $table->string('role', 150);
        });

        User::insert(
            [
                'email' => 'demo',
                'password' => Hash::make('demo'),
                'role' => 'guest'
            ]
        );

        User::insert(
            [
                'email' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
