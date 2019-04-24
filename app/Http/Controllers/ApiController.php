<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function show()
    {
        $data['arma3_server_url'] = route('api.arma3.server');
        $data['arma3_network_url'] = route('api.arma3.network');
        $data['factorio_server_url'] = route('api.factorio.server');
        $data['factorio_map_url'] = route('api.factorio.map');
        $data['factorio_map_gen_url'] = route('api.factorio.mapgen');
        $data['minecraft_server_url'] = route('api.minecraft.server');
        $data['warband_url'] = route('api.warband');

        return response()->json($data);
    }
}
