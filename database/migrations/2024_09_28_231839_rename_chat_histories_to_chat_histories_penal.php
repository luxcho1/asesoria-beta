<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameChatHistoriesToChatHistoriesPenal extends Migration
{
    public function up()
    {
        Schema::rename('chat_histories', 'chat_histories_penal');
    }

    public function down()
    {
        Schema::rename('chat_histories_penal', 'chat_histories');
    }
}
