<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusAndPaidAtToTicketsInfosTable extends Migration
{
    public function up()
    {
        Schema::table('tickets_infos', function (Blueprint $table) {
            $table->string('status')->default('pending')->after('totla_price');
            $table->timestamp('paid_at')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('tickets_infos', function (Blueprint $table) {
            $table->dropColumn(['status', 'paid_at']);
        });
    }
}