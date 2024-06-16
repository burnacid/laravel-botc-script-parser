<?php

namespace App\Http\Controllers;

use App\Models\BotcHistoricJinx;
use App\Models\BotcJinx;
use App\Models\BotcRole;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BotcJinxController extends Controller
{
    public function edit(string $role, string $with){
        $jinx = BotcJinx::find($role,$with);

        if(!$jinx){
            abort(404);
        }

        return view('botcjinxes.edit', compact('jinx'));
    }

    public function update(Request $request, string $role, string $with){
        $request->validate([
            'jinx' => 'required'
        ]);

        $jinx = BotcJinx::find($role,$with);

        if(!$jinx){
            return back()->with('failure','Something went wrong, you tried to update a jinx that doesn\'t exist.');
        }

        if($request->jinx == $jinx->jinx){
            return back()->with('failure','Nothing changed, we can\'t update the jinx.');
        }

        if($request->history == 1){
            $history = New BotcHistoricJinx();
            $history->role_id = $jinx->role_id;
            $history->jinx_with = $jinx->jinx_with;
            $history->jinx = $jinx->jinx;
            $history->since = Carbon::now();
            $history->save();
        }

        $jinx->jinx = $request->jinx;
        $jinx->save();

        return redirect(route('settings.botcjinx'))->with('success','Successfully updated jinx.');
    }

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
