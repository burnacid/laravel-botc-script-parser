<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\BotcRole;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        BotcRole::collectRoles();

        $RolesWithUnderscore = BotcRole::where('id', 'like', '%\_%')->get();
        foreach ($RolesWithUnderscore as $role) {
            $newRoleId = str_replace("_","",$role->id);
            $newRole = BotcRole::find($newRoleId);
            if(!$newRole){
                continue;
            }

            $newRole->ability = $role->ability;
            $newRole->firstNightReminder = $role->firstNightReminder;
            $newRole->otherNightReminder = $role->otherNightReminder;
            $newRole->save();
        }

        BotcRole::collectNightOrder();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
