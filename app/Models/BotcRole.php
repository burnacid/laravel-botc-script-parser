<?php

namespace App\Models;

use DOMDocument;
use DOMXPath;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BotcRole extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public function jinx(): HasMany
    {
        return $this->hasMany(BotcJinx::class, 'role_id', 'id');
    }

    public function grepIcon(): bool
    {
        try {
            $name = "Icon_" . str_replace("_","",$this->id) . ".png";
            $extractPatern = '/<img alt=\"File:Icon.*\" src=\".*" decoding.* \/>/';
            $response = Http::withOptions(['verify' => false])->get('https://wiki.bloodontheclocktower.com/File:' . $name);
            preg_match($extractPatern, $response->body(), $matches);

            $DOM = new DOMDocument();
            $DOM->loadHTML($matches[0]);

            $xpath = new DOMXPath(@$DOM);
            $src = $xpath->evaluate("string(//img/@src)");

            $url = "https://wiki.bloodontheclocktower.com" . $src;
            $pathInfo = pathinfo($url);
            $ext = explode("?", $pathInfo['extension']);
            $extension = $ext[0];
            $fileName = $this->id . "." . $extension;
            $contents = file_get_contents($url);

            Storage::put('public/roles/' . $fileName, $contents);

            $this->image = $fileName;
            $this->save();

            return true;
        }catch (\Exception $exception){
            return false;
        }
    }

    public static function collectRoles(): void
    {
        $url = "https://script.bloodontheclocktower.com/data/roles.json";
        $response = Http::withOptions(['verify' => false])->get($url);

        $json = json_decode($response->body());

        foreach($json as $role){
            $id = BotcRole::translateRole($role->id);
            if(!BotcRole::find($id)){
                $NewRole = new BotcRole();
                $NewRole->id = $id;
                $NewRole->name = $role->name;

                if($role->roleType == "travellers"){
                    $role->roleType = "traveler";
                }

                $NewRole->team = $role->roleType;
                $NewRole->save();
            }
        }
    }

    public static function collectNightOrder(): void
    {
        $url = "https://script.bloodontheclocktower.com/data/nightsheet.json";
        $response = Http::withOptions(['verify' => false])->get($url);

        $json = json_decode($response->body());

        $firstNight = $json->firstNight;
        $otherNight = $json->otherNight;

        foreach($firstNight as $order => $roleName){
            $role = BotcRole::where('name', $roleName)->first();
            $role->firstNight = $order;
            $role->save();
        }

        foreach($otherNight as $order => $roleName){
            $role = BotcRole::where('name', $roleName)->first();
            $role->otherNight = $order;
            $role->save();
        }
    }

    public static function translateRole($role): string{
        return strtolower(str_replace(" ","_",str_replace("'","",$role)));
    }

    public function formattedAbility(){
        $ability = str_replace("[","<strong>[",$this->ability);
        $ability = str_replace("]","]</strong>",$ability);

        return $ability;
    }
}
