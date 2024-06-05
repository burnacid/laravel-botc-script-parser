<?php

namespace App\Http\Controllers;

use App\Models\BotcRole;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use mysql_xdevapi\Collection;

class FrontEndController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }

    public function process(Request $request)
    {
        $request->validate([
            'json' => 'required|mimes:json|max:2048',
        ]);

        $json = json_decode(file_get_contents($request->json));

        $roles = BotcRole::where("team","_meta")->get();

        foreach ($json as $item) {
            if(gettype($item) == 'object'){
                if($item->id == "_meta"){
                    continue;
                }

                $role = $item->id;
            }else{
                $role = $item;
            }

            $BotCRole = BotCRole::find($role);
            if(!$BotCRole){
                echo "$role not found";
                continue;
            }

            $roles->add($BotCRole);
        }

        return view('print', compact('roles'));

        // Night Order sheet first day
//        foreach($roles->where("firstNight","!=",null)->sortBy("firstNight") as $act){
//            echo "<strong>".$act->name."</strong> <small>".$act->ability."</small><br/>". $act->firstNightReminder ."<br /><br/>";
//        }
//
//        echo "<hr>";
//
//        // Night Order sheet order days
//        foreach($roles->where("otherNight","!=",null)->sortBy("otherNight") as $act){
//            echo "<strong>".$act->name."</strong> <small>".$act->ability."</small><br/>". $act->otherNightReminder ."<br /><br/>";
//        }
    }
}
