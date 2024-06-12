<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Http;

class BotcJinx extends Model
{
    use HasFactory;

    // https://script.bloodontheclocktower.com/data/jinx.json

    public $incrementing = false;
    protected $primaryKey = ['role_id', 'jinx_with'];
    protected $keyType = 'string';

    protected $with = ['role','withRole'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(BotcRole::class, 'role_id', 'id');
    }

    public function withRole(): BelongsTo
    {
        return $this->belongsTo(BotcRole::class, 'jinx_with', 'id');
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
                $existingJinx = BotcJinx::where('role_id', $role_id)->where('jinx_with', $jinx_with)->first();
                if($existingJinx){
                    $existingJinx->jinx = $withJinx->reason;
                    $existingJinx->save();
                    continue;
                }

                $newJinx = new BotcJinx();
                $newJinx->role_id = $role_id;
                $newJinx->jinx_with = $jinx_with;
                $newJinx->jinx = $withJinx->reason;
                $newJinx->save();
            }
        }
    }
}
