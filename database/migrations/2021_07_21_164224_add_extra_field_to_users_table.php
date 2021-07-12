<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('password');
            $table->string('hobby')->after('gender');
            $table->string('dob')->after('hobby');
            $table->text('address')->after('dob');
            $table->unsignedBigInteger('city_id')->after('address');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->after('city_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('phone')->after('country_id');
            $table->tinyInteger('status')->default('1')->after('city_id')->comment = '1=Active,0=Deactive';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('hobby');
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('city_id');
            $table->dropColumn('country_id');
            $table->dropForeign(['city_id','country_id']);
            $table->dropColumn('phone');
            $table->dropColumn('status');
        });
    }
}
