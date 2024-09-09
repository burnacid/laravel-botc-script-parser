<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Http;

class BotcJinx extends Model
{
    use HasFactory;

//    public $incrementing = false;
//    protected $primaryKey = ['role_id', 'jinx_with'];
//    protected $keyType = 'string';

    protected $with = ['role','withRole'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(BotcRole::class, 'role_id', 'id');
    }

    public function withRole(): BelongsTo
    {
        return $this->belongsTo(BotcRole::class, 'jinx_with', 'id');
    }

    public static function find($role_id, $jinx_with){
        return BotcJinx::where('role_id', $role_id)->where('jinx_with', $jinx_with)->first();
    }

    public function historyJinxes()
    {
        $jinxes = BotcHistoricJinx::where('role_id',$this->role_id)->where('jinx_with', $this->jinx_with)->get();
        return $jinxes;
    }

    public static function collectJinx(): void
    {
        $url = "https://script.bloodontheclocktower.com/data/jinx.json";
        $response = Http::withOptions(['verify' => false])->get($url);

        $json = json_decode($response->body());

        foreach($json as $jinx){
            $role_id = BotcRole::translateRole($jinx->id);
            $role = BotcRole::find($role_id);

            if($role == null){
                continue;
            }

            foreach($jinx->jinx as $withJinx){
                $jinx_with = BotcRole::translateRole($withJinx->id);

                // Check if there is an existing jinx
                $existingJinx = BotcJinx::find($role_id, $jinx_with);
                if($existingJinx){
                    // Check if jinx text is the same
                    if($existingJinx->jinx == $withJinx->reason){
                        echo "Jinx is current... skipping\n";
                        continue;
                    }

                    $historicJinxes = $existingJinx->historyJinxes()->where('jinx', $withJinx->reason);
                    if($historicJinxes->count() > 0){
                        echo "Jinx found in historical jinxes... skipping\n";
                        continue;
                    }

                    // Write Historic Jinx
                    $newHistoryJinx = new BotcHistoricJinx();
                    $newHistoryJinx->role_id = $existingJinx->role_id;
                    $newHistoryJinx->jinx_with = $existingJinx->jinx_with;
                    $newHistoryJinx->jinx = $existingJinx->jinx;
                    $newHistoryJinx->since = Carbon::now();
                    $newHistoryJinx->save();

                    // Update Jinx
                    $existingJinx->jinx = $withJinx->reason;
                    $existingJinx->save();
                    continue;
                }

                // Save new jinx
                $newJinx = new BotcJinx();
                $newJinx->role_id = $role_id;
                $newJinx->jinx_with = $jinx_with;
                $newJinx->jinx = $withJinx->reason;
                $newJinx->save();
            }
        }

        ## Cleanup old unlinked jinxes
        $jinxes = BotcJinx::all();
        foreach ($jinxes as $jinx) {
            if(!$jinx->role){
                $jinx->delete();
                echo "Removing jinx {$role->role_id}, {$role->jinx_with}\n";
                continue;
            }

            if(!$jinx->withRole){
                $jinx->delete();
                echo "Removing jinx {$role->role_id}, {$role->jinx_with}\n";
            }
        }

        $jinxes = BotcHistoricJinx::all();
        foreach ($jinxes as $jinx) {
            if(!$jinx->role){
                $jinx->delete();
                echo "Removing jinx {$role->role_id}, {$role->jinx_with}\n";
                continue;
            }

            if(!$jinx->withRole){
                $jinx->delete();
                echo "Removing jinx {$role->role_id}, {$role->jinx_with}\n";
            }
        }
    }
}
