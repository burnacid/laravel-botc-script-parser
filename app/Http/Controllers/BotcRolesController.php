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

    public function edit(Request $request, BotcRole $botcRole){
        return view('botcroles.edit', compact('botcRole'));
    }

    public function update(Request $request, BotcRole $botcRole){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'ability' => 'required',
            'team' => 'required',
            'image' => 'mimes:jpg,png|max:2048'
        ]);

        if($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $fileNameSplit = explode('.', $fileName);
            $extension = array_pop($fileNameSplit);
            $imageName = $request->input('id') . "." . $extension;
            $file->storeAs('public/roles', $imageName);
            $botcRole->image = $imageName;
        }

        $botcRole->id = $request->input('id');
        $botcRole->name = $request->input('name');
        $botcRole->ability = $request->input('ability');
        $botcRole->firstNightReminder = $request->input('firstNightReminder');
        $botcRole->otherNightReminder = $request->input('otherNightReminder');
        $botcRole->team = $request->input('team');
        $botcRole->save();

        return redirect('/botcroles')->with('success', $botcRole->name. ' successfully updated!');
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
