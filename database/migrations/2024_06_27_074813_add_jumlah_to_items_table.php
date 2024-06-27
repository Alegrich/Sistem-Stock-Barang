<?php

// database/migrations/xxxx_xx_xx_xxxxxx_add_quantity_to_items_table.php

// database/migrations/xxxx_xx_xx_xxxxxx_add_quantity_column_to_items_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuantityColumnToItemsTable extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('quantity')->default(0);
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
}
