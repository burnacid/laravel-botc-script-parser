<?php

namespace App\Http\Controllers;

use App\Models\BotcRole;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BotcRolesController extends Controller
{
    public function import(Request $request){
        return view('botcroles.import');
    }

    public function importPost(Request $request){
        $json = json_decode($request->json);
        foreach($json->character_by_id as $character){
            $role = BotcRole::find($character->id);
            if($role == null){
                $role = new BotcRole();
            }

            $role->id = $character->id;
            $role->name = $character->name;

            if($character->ability) {
                $role->ability = $character->ability;
            }
            $role->firstNight = $character->firstNight;
            $role->firstNightReminder = $character->firstNightReminder;
            $role->otherNight = $character->otherNight;
            $role->otherNightReminder = $character->otherNightReminder;
            $role->team = $character->team;

            $role->save();
        }
    }
}
