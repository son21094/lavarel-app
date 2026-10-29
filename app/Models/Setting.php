<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    // database/migrations/xxxx_xx_xx_xxxxxx_create_settings_table.php

public function up()
{
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->boolean('dark_mode')->default(false);
        $table->timestamps();
    });
}
}
