<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class PlayerController extends Controller
{
    //
    public function getPlayersList() {
        $players = Storage::get('public/json/players.json');
        return $players;
    }

    public function savePlayersList(Request $request) {
        $encoded_players = json_encode($request->players);
        try {
            Storage::delete('public/json/players.json');
            Storage::put('public/json/players.json', $encoded_players);
            $res = $request->players;
        } catch (Exception $e) {
            $res = $e;
        }
        return $res;
    }
}
