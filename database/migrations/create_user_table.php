<?php

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('user',function($table){
    $table->increments('id');
    $table->string('username');
    $table->string('email')->unique();
    $table->string('password');
    $table->enum('role',['admin','super-admin'])->default('admin');
    $table->timestamps();
});