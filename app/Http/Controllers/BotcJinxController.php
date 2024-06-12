<?php

namespace App\Http\Controllers;

use App\Models\BotcJinx;
use Illuminate\Http\Request;

class BotcJinxController extends Controller
{
    public function index(Request $request){
        $allJinxes = BotcJinx::all();

        $q = $request->q;

        $jinxes = BotcJinx::when($request->q, function($query) use ($q) {
            return $query->whereHas('role', function ($query) use ($q) {
                $query->where('name', 'like', '%'.$q.'%');
            })->orWhereHas('withRole', function ($query) use ($q) {
                $query->where('name', 'like', '%'.$q.'%');
            });
        })->orWhere('jinx', 'like', '%'.$q.'%')->paginate(15);

        return view('botcjinxes.index', compact('allJinxes', 'q', 'jinxes'));
    }
}
