<?php

namespace App\Http\Controllers;

use App\Models\BotcRole;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;

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

        $title = "Unnamed Script";
        $author = "Unknown";

        $json = json_decode(file_get_contents($request->json));

        $roles = BotcRole::where("team","_meta")->get();

        foreach ($json as $item) {
            if(gettype($item) == 'object'){
                if($item->id == "_meta"){
                    if(isset($item->name)){
                        $title = $item->name;
                    }
                    if(isset($item->author)){
                        $author = $item->author;
                    }
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

        // Get jinxes
        $jinxes = collect();
        foreach ($roles as $role) {
            if($role->jinx->count() == 0){
                continue;
            }

            foreach($role->jinx as $jinx){
                $inPlay = $roles->where('id',$jinx->jinx_with)->first();
                if($inPlay){
                    $jinxes->add((object)[
                        'jinx' => $jinx->jinx,
                        'role' => $role,
                        'with' => $inPlay,
                        'role_id' => $jinx->role_id,
                        'jinx_with' => $jinx->jinx_with
                    ]);
                }
            }
        }

        return view('print', compact('roles','author', 'title', 'jinxes'));
    }
}
