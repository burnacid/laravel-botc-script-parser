<?php

use App\Models\BotcJinx;
use App\Models\BotcRole;
//use Illuminate\Foundation\Inspiring;
//use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;


Schedule::call(function () {
    BotcRole::collectRoles();
    BotcRole::collectNightOrder();
    BotcJinx::collectJinx();
})->daily()->name('Collect BotC Roles & Jinxs');

Schedule::call(function () {
    $Roles = BotcRole::where('team', "!=", "_meta")->whereNull('image')->get();
    foreach ($Roles as $Role) {
        $Role->grepIcon();
    }
})->daily()->name('Collect Icons');
