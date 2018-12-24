<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FactorioController extends Controller
{
    public function __construct()
    {
        $this->verylow = 'very-low';
        $this->low = 'low';
        $this->normal = 'normal';
        $this->high = 'high';
        $this->veryhigh = 'high';
        $this->time = date('D M j G:i:s T Y');
    }

    public function gen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'terrain_segmentation'     => 'sometimes|required|filled|numeric|min:1|max:5',
            'water'                    => 'sometimes|required|filled|numeric|min:1|max:5',
            'width'                    => 'sometimes|required|filled|numeric',
            'height'                   => 'sometimes|required|filled|numeric',
            'starting_area'            => 'sometimes|required|filled|numeric|min:1|max:5',
            'peaceful_mode'            => 'sometimes|required|filled|boolean',
            'coal'                     => 'sometimes|required|filled|numeric|min:1|max:5',
            'stone'                    => 'sometimes|required|filled|numeric|min:1|max:5',
            'copper-ore'               => 'sometimes|required|filled|numeric|min:1|max:5',
            'iron-ore'                 => 'sometimes|required|filled|numeric|min:1|max:5',
            'uranium-ore'              => 'sometimes|required|filled|numeric|min:1|max:5',
            'crude-oil'                => 'sometimes|required|filled|numeric|min:1|max:5',
            'trees'                    => 'sometimes|required|filled|numeric|min:1|max:5',
            'enemy-base'               => 'sometimes|required|filled|numeric|min:1|max:5',
            'grass'                    => 'sometimes|required|filled|numeric|min:1|max:5',
            'desert'                   => 'sometimes|required|filled|numeric|min:1|max:5',
            'dirt'                     => 'sometimes|required|filled|numeric|min:1|max:5',
            'sand'                     => 'sometimes|required|filled|numeric|min:1|max:5',
            'cliff_name'               => 'sometimes|required|filled|string|max:20',
            'cliff_elevation'          => 'sometimes|required|filled|numeric|max:10',
            'cliff_elevation_interval' => 'sometimes|required|filled|numeric|max:10',
            'seed'                     => 'sometimes|required|filled|string|max:700',
        ]);

        $errors = $validator->errors();

        if ($errors->count()) {
            return response($errors->all(), 400);
        }

        $data['create_time'] = $this->time;
        $data['terrain_segmentation'] =
            (string) $request->has('terrain_segmentation') ? $request->input('terrain_segmentation') : $this->normal;
        $data['water'] = (string) $request->has('water') ? $request->input('water') : $this->normal;
        $data['width'] = (int) $request->has('width') ? $request->input('water') : 0;
        $data['height'] = (int) $request->has('height') ? $request->input('height') : 0;
        $data['starting_area'] =
            (string) $request->has('starting_area') ? $request->input('starting_area') : $this->normal;
        $data['peaceful_mode'] = (bool) $request->has('peaceful_mode') ? $request->input('peaceful_mode') : 'false';
        $data['coal'] = (string) $request->has('coal') ? $request->input('coal') : $this->normal;
        $data['stone'] = (string) $request->has('stone') ? $request->input('stone') : $this->normal;
        $data['copper'] = (string) $request->has('copper-ore') ? $request->input('copper-ore') : $this->normal;
        $data['iron'] = (string) $request->has('iron-ore') ? $request->input('iron-ore') : $this->normal;
        $data['uranium'] = (string) $request->has('uranium-ore') ? $request->input('uranium-ore') : $this->normal;
        $data['crude'] = (string) $request->has('crude-oil') ? $request->input('crude-oil') : $this->normal;
        $data['trees'] = (string) $request->has('trees') ? $request->input('trees') : $this->normal;
        $data['enemy'] = (string) $request->has('enemy-base') ? $request->input('enemy-base') : $this->normal;
        $data['grass'] = (string) $request->has('grass') ? $request->input('grass') : $this->normal;
        $data['desert'] = (string) $request->has('desert') ? $request->input('desert') : $this->normal;
        $data['dirt'] = (string) $request->has('dirt') ? $request->input('dirt') : $this->normal;
        $data['sand'] = (string) $request->has('sand') ? $request->input('sand') : $this->normal;
        $data['cliff_name'] = (string) $request->has('cliff_name') ? $request->input('cliff_name') : 'cliff';
        $data['cliff_elevation'] = (int) $request->has('cliff_elevation') ? $request->input('cliff_elevation') : 10;
        $data['cliff_elevation_interval'] =
            (int) $request->has('cliff_elevation_interval') ? $request->input('cliff_elevation_interval') : 10;
        $data['seed'] = (string) $request->has('sand') ? $request->input('sand') : 'null';

        return response()
            ->view('factorio.map-gen', $data)
            ->header('Content-Type', 'application/json');
    }

    public function server(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                                      => 'required|filled|string|min:4|max:30',
            'description'                               => 'sometimes|required|filled|string|min:8|max:255',
            'tags'                                      => 'sometimes|required|filled|string',
            'max_players'                               => 'sometimes|required|filled|numeric',
            'public'                                    => 'sometimes|required|filled|boolean',
            'lan'                                       => 'sometimes|required|filled|boolean',
            'token'                                     => 'sometimes|required|filled|string|min:30|max:30',
            'game_password'                             => 'sometimes|required|filled|string|min:8|max:30',
            'require_user_verification'                 => 'sometimes|required|filled|boolean',
            'max_upload_in_kilobytes_per_second'        => 'sometimes|required|filled|numeric',
            'minimum_latency_in_ticks'                  => 'sometimes|required|filled|numeric',
            'ignore_player_limit_for_returning_players' => 'sometimes|required|filled|boolean',
            'allow_commands'                            => 'sometimes|required|filled|string',
            'autosave_interval'                         => 'sometimes|required|filled|numeric',
            'autosave_slots'                            => 'sometimes|required|filled|numeric',
            'afk_autokick_interval'                     => 'sometimes|required|filled|numeric',
            'auto_pause'                                => 'sometimes|required|filled|numeric',
            'only_admins_can_pause_the_game'            => 'sometimes|required|filled|boolean',
            'autosave_only_on_server'                   => 'sometimes|required|filled|boolean',
            'non_blocking_saving'                       => 'sometimes|required|filled|boolean',
            'admins'                                    => 'sometimes|required|filled|string',
        ]);

        $errors = $validator->errors();

        if ($errors->count()) {
            return response($errors->all(), 400);
        }

        $data['create_time'] = $this->time;
        $data['name'] = (string) $request->input('name');
        $data['description'] = (string) $request->has('sand') ? $request->input('sand')
            : 'Description of the game that will appear in the listing';
        $data['tags'] =
            (string) $request->has('tags') ? str_replace(',', '","', $request->input('tags')) : 'null';
        $data['max_players'] = (int) $request->has('max_players') ? $request->input('max_players') : 0;
        $data['public'] = (bool) $request->has('token') ? $request->input('public') : 'false';
        $data['lan'] = (bool) $request->has('lan') ? $request->input('lan') : 'true';
        $data['token'] = (string) $request->has('token') ? $request->input('token') : null;
        $data['game_password'] = (string) $request->has('game_password') ? $request->input('game_password') : null;
        $data['require_user_verification'] =
            (bool) $request->has('require_user_verification') ? $request->input('require_user_verification') : 'true';
        $data['max_upload_in_kilobytes_per_second'] = (int) $request->has('max_upload_in_kilobytes_per_second')
            ? $request->input('max_upload_in_kilobytes_per_second') : 0;
        $data['minimum_latency_in_ticks'] =
            (int) $request->has('minimum_latency_in_ticks') ? $request->input('minimum_latency_in_ticks') : 0;
        $data['ignore_player_limit_for_returning_players'] =
            (bool) $request->has('ignore_player_limit_for_returning_players')
                ? $request->input('ignore_player_limit_for_returning_players') : 'false';
        $data['allow_commands'] =
            (string) $request->has('allow_commands') ? $request->input('allow_commands') : 'admins-only';
        $data['autosave_interval'] =
            (int) $request->has('autosave_interval') ? $request->input('autosave_interval') : 10;
        $data['autosave_slots'] = (int) $request->has('autosave_slots') ? $request->input('autosave_slots') : 5;
        $data['afk_autokick_interval'] =
            (int) $request->has('afk_autokick_interval') ? $request->input('afk_autokick_interval') : 0;
        $data['auto_pause'] = (bool) $request->has('auto_pause') ? $request->input('auto_pause') : 'true';
        $data['only_admins_can_pause_the_game'] =
            (bool) $request->has('only_admins_can_pause_the_game') ? $request->input('only_admins_can_pause_the_game')
                : 'true';
        $data['autosave_only_on_server'] =
            (bool) $request->has('autosave_only_on_server') ? $request->input('autosave_only_on_server') : 'true';
        $data['non_blocking_saving'] =
            (bool) $request->has('$non_blocking_saving') ? $request->input('$non_blocking_saving') : 'false';
        $data['admins'] =
            (string) $request->has('admins') ? str_replace(',', '","', $request->input('admins')) : 'null';

        return response()
            ->view('factorio.server', $data)
            ->header('Content-Type', 'application/json');
    }

    public function map()
    {
        return response()
            ->view('factorio.map')
            ->header('Content-Type', 'application/json');
    }
}
