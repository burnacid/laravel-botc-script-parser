<?php

use App\Models\BotcJinx;
use App\Models\BotcRole;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    BotcRole::collectRoles();
    BotcJinx::collectJinx();
})->daily()->name('Collect BotC Roles & Jinxs');


Schedule::call(function () {
    $Roles = BotcRole::where('team', "!=", "_meta")->whereNull('image')->get();
    foreach ($Roles as $Role) {
        $Role->grepIcon();
    }
})->daily()->name('Collect Icons');
