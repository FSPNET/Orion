<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MinecraftController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'generator-settings'            => 'sometimes|filled|required|string|min:4|max:100',
            'op-permission-level'           => 'sometimes|filled|required|numeric|min:1|max:4',
            'allow-nether'                  => 'sometimes|filled|required|boolean',
            'level-name'                    => 'sometimes|filled|required|string|min:4|max:100',
            'enable-query'                  => 'sometimes|filled|required|boolean',
            'allow-flight'                  => 'sometimes|filled|required|boolean',
            'prevent-proxy-connections'     => 'sometimes|filled|required|boolean',
            'server-port'                   => 'sometimes|filled|required|numeric|min:1|max:65534',
            'max-world-size'                => 'sometimes|filled|required|numeric|min:1|max:29999984',
            'level-type'                    => [
                'sometimes',
                'filled',
                'required',
                'string',
                'min:4',
                'max:12',
                'regex:(^DEFAULT$|^FLAT$|^LARGEBIOMES$|^AMPLIFIED$|^CUSTOMIZED$)',
            ],
            'enable-rcon'                   => 'sometimes|filled|required|boolean',
            'level-seed'                    => 'sometimes|filled|required|string',
            'force-gamemode'                => 'sometimes|filled|required|boolean',
            'server-ip'                     => 'sometimes|filled|required|string|min:3',
            'network-compression-threshold' => 'sometimes|filled|required|numeric',
            'max-build-height'              => 'sometimes|filled|required|numeric',
            'spawn-npcs'                    => 'sometimes|filled|required|boolean',
            'white-list'                    => 'sometimes|filled|required|boolean',
            'spawn-animals'                 => 'sometimes|filled|required|boolean',
            'hardcore'                      => 'sometimes|filled|required|boolean',
            'snooper-enabled'               => 'sometimes|filled|required|boolean',
            'resource-pack-sha1'            => 'sometimes|filled|required|alpha_dash|min:40|max:40',
            'online-mode'                   => 'sometimes|filled|required|boolean',
            'resource-pack'                 => 'sometimes|filled|required|url',
            'pvp'                           => 'sometimes|filled|required|boolean',
            'difficulty'                    => 'sometimes|filled|required|numeric|min:0|max:3',
            'enable-command-block'          => 'sometimes|filled|required|boolean',
            'gamemode'                      => 'sometimes|filled|required|numeric|min:0|max:3',
            'player-idle-timeout'           => 'sometimes|filled|required|numeric|min:0',
            'max-players'                   => 'sometimes|filled|required|numeric|min:1|max:2147483647',
            'max-tick-time'                 => 'sometimes|filled|required|numeric|min:-1',
            'spawn-monsters'                => 'sometimes|filled|required|boolean',
            'view-distance'                 => 'sometimes|filled|required|numeric|min:3|max:15',
            'use-native-transport'          => 'sometimes|filled|required|boolean',
            'generate-structures'           => 'sometimes|filled|required|boolean',
            'motd'                          => 'sometimes|filled|required|string|min:3|max:59',
        ]);

        $errors = $validator->errors();

        if ($errors->count()) {
            return $errors->all();
        }

        $data['create_time'] = date('D M j G:i:s T Y');
        $data['generator_settings'] =
            (string) $request->has('generator-settings') ? $request->input('generator-settings') : '';
        $data['op_permission_level'] =
            (int) $request->has('op-permission-level') ? $request->input('op-permission-level') : '4';
        $data['allow_nether'] = (bool) $request->has('allow-nether') ? $request->input('allow-nether') : 'true';
        $data['level_name'] = (string) $request->has('level-name') ? $request->input('level-name') : 'world';
        $data['enable_query'] = (bool) $request->has('enable-query') ? $request->input('enable-query') : 'false';
        $data['allow_flight'] = (bool) $request->has('allow-flight') ? $request->input('allow-flight') : 'false';
        $data['prevent_proxy_connections'] =
            (bool) $request->has('prevent-proxy-connections') ? $request->input('prevent-proxy-connections') : 'false';
        $data['server_port'] = (int) $request->has('server-port') ? $request->input('server-port') : '25565';
        $data['max_world_size'] = (int) $request->has('max-world-size') ? $request->has('max-world-size') : '29999984';
        $data['level_type'] = (string) $request->has('level-type') ? $request->input('level-type') : 'DEFAULT';
        $data['enable_rcon'] = (bool) $request->has('enable-rcon') ? $request->input('enable-rcon') : 'false';
        $data['level_seed'] = (string) $request->has('level-seed') ? $request->input('level-seed') : '';
        $data['force_gamemode'] = (bool) $request->has('force-gamemode') ? $request->input('force-gamemode') : 'false';
        $data['server_ip'] = (string) $request->has('server-ip') ? $request->input('server-ip') : '';
        $data['network_compression_threshold'] =
            (int) $request->has('network-compression-threshold') ? $request->input('network-compression-threshold')
                : '256';
        $data['max_build_height'] =
            (int) $request->has('max-build-height') ? $request->input('max-build-height') : '256';
        $data['spawn_npcs'] = (bool) $request->has('spawn-npcs') ? $request->input('spawn-npcs') : 'true';
        $data['white_list'] = (bool) $request->has('white-list') ? $request->input('white-list') : 'false';
        $data['spawn_animals'] = (bool) $request->has('spawn-animals') ? $request->input('spawn-animals') : 'true';
        $data['hardcore'] = (bool) $request->has('hardcore') ? $request->input('hardcore') : 'false';
        $data['snooper_enabled'] =
            (bool) $request->has('snooper-enabled') ? $request->input('snooper-enabled') : 'false';
        $data['resource_pack_sha1'] = (string) $request->has('resource-pack') ? $request->input('resource-pack') : '';
        $data['online_mode'] = (bool) $request->has('online-mode') ? $request->input('online-mode') : 'true';
        $data['resource_pack'] = (string) $request->has('resource-pack') ? $request->input('resource-pack') : '';
        $data['pvp'] = (bool) $request->has('pvp') ? $request->input('pvp') : 'true';
        $data['difficulty'] = (int) $request->has('difficulty') ? $request->input('difficulty') : '1';
        $data['enable_command_block'] =
            (bool) $request->has('enable-command-block') ? $request->input('enable-command-block') : 'false';
        $data['gamemode'] = (int) $request->has('gamemode') ? $request->input('gamemode') : '0';
        $data['player_idle_timeout'] =
            (int) $request->has('player-idle-timeout') ? $request->input('player-idle-timeout') : '0';
        $data['max_players'] = (int) $request->has('max-players') ? $request->input('max-players') : '20';
        $data['max_tick_time'] = (int) $request->has('max-tick-time') ? $request->input('max-tick-time') : '60000';
        $data['spawn_monsters'] = (bool) $request->has('spawn-monsters') ? $request->input('spawn-monsters') : 'true';
        $data['view_distance'] = (int) $request->has('view-distance') ? $request->input('view-distance') : '10';
        $data['use_native_transport'] =
            (bool) $request->has('use-native-transport') ? $request->input('use-native-transport') : 'true';
        $data['generate_structures'] =
            (bool) $request->has('generate-structures') ? $request->input('generate-structures') : 'true';
        $data['motd'] = (string) $request->has('motd') ? $request->input('motd') : 'A Minecraft Server';

        return response()
            ->view('minecraft.server', $data)
            ->header('Content-Type', 'text/plain');
    }
}
