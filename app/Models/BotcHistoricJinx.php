<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BotcHistoricJinx extends Model
{
    use HasFactory;

//    public $incrementing = false;
    protected $table = 'botc_jinxes_history';
//    protected $primaryKey = ['role_id', 'jinx_with', 'since'];
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
}
