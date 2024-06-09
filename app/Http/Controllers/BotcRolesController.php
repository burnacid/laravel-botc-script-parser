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

    public function index(Request $request){
        if($request->q){
            $q = $request->q;
            $roles = BotcRole::where('name', 'like', '%'.$request->q.'%')->orWhere('team','like', '%'.$request->q.'%')->orderBy('name')->paginate(15);
        }else{
            $q = "";
            $roles = BotcRole::orderBy('name')->paginate(15);
        }

        return view('botcroles.index', compact('roles','q'));
    }

    public function destroy(Request $request, BotcRole $botcRole){

        if($botcRole->image){
            $deleteImage = Storage::delete('public/roles/' . $botcRole->image);

            if(!$deleteImage){
                return redirect('/botcroles')->with('failure', $botcRole->name. ' could not be deleted as the image didn\'t get deleted!');
            }
        }

        $botcRole->delete();

        return redirect('/botcroles')->with('success', $botcRole->name. ' deleted!');
    }
}
