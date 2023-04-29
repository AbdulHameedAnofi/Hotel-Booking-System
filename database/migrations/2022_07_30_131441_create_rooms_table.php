<?php

use App\Models\RoomType;
use App\Models\User;
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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RoomType::class,'room_type_id');
            $table->string('number')->unique();
            $table->double('price');
            $table->tinyInteger('capacity');
            $table->boolean('status')->default(true)->nullable();
            $table->foreignIdFor(User::class,'created_by');
            $table->foreignIdFor(User::class,'updated_by')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
