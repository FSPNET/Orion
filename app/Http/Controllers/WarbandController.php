<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarbandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mod'              => 'required|filled|string|min:5|max:20',
            'password_admin'   => 'required|filled|string|min:8|max:30',
            'password_private' => 'sometimes|filled|string|min:6|max:24',
            'server_name'      => 'required|filled|alpha_dash|min:4|max:20',
            'welcome_message'  => 'sometimes|filled|string|min:8|max:255',
            'valve_anti_cheat' => 'sometimes|filled|boolean',
            'mission'          => 'required|filled|alpha_dash|min:2|max:20',
            'max_players'      => 'sometimes|filled|numeric|min:2|max:200',
            'port'             => 'required|filled|numeric|min:7140|max:17240',
            'steam_port'       => 'sometimes|filled|numberic|min:7140|max:17240',
        ]);

        $errors = $validator->errors();

        if ($errors->count()) {
            return $errors->all();
        }

        $data['pass_admin'] = (string) $request->input('password_admin');
        $data['pass_private'] =
            (string) $request->has('password_private') ? $request->input('password_private') : 'PRIVATEPASS';
        $data['server_name'] = (string) $request->input('server_name');
        $data['welcome_message'] =
            (string) $request->has('welcome_message') ? $request->input('welcome_message') : 'Welcome';
        $data['valve_anti_cheat'] =
            (bool) $request->has('valve_anti_cheat') ? $request->input('valve_anti_cheat') : 0;
        $data['mission'] = (string) $request->input('mission');
        $data['max_players'] = (int) $request->has('max_players') ? $request->input('max_players') : 32;
        $data['port'] = (int) $request->input('port');
        $data['steam_port'] = (int) $request->has('steam_port') ? $request->input('steam_port') : false;

        return response()
            ->view('warband.native', $data)
            ->header('Content-Type', 'text/plain');
    }
}
