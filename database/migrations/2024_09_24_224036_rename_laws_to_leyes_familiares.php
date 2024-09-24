<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLawsToLeyesFamiliares extends Migration
{
    public function up()
    {
        Schema::rename('laws', 'leyes_familiares');
    }

    public function down()
    {
        Schema::rename('leyes_familiares', 'laws');
    }
}


