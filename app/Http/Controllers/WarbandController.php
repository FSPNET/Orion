<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarbandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'mod'              => 'required|string|min:5|max:20',
            'password_admin'   => 'required|string|min:8|max:30',
            'password_private' => 'sometimes|required|string|min:6|max:24',
            'server_name'      => 'required|alpha_dash|min:4|max:20',
            'welcome_message'  => 'sometimes|required|string|min:8|max:255',
            'valve_anti_cheat' => 'sometimes|required|boolean',
            'mission'          => 'required|alpha_dash|min:2|max:20',
            'max_players'      => 'sometimes|required|numeric|min:2|max:200',
            'port'             => 'required|numeric|min:7140|max:17240',
            'steam_port'       => 'sometimes|required|numberic|min:7140|max:17240',

        ]);

        $data['pass_admin'] = (string) $request->input('password_admin');

        //        if ($request->has('password_private')) {
        //            $data['pass_private'] = (string) $request->input('password_private');
        //        } else {
        //            $data['pass_private'] = "PRIVATEPASS";
        //        }
        $data['pass_private'] =
            (string) $request->has('password_private') ? $request->input('password_private') : "PRIVATEPASS";

        $data['server_name'] = (string) $request->input('server_name');

        //        if ($request->has('welcome_message')){
        //            $data['welcome_message'] = (string) $request->input('welcome_message');
        //        }else{
        //            $data['welcome_message'] = "Welcome";
        //        }
        $data['welcome_message'] =
            (string) $request->has('welcome_message') ? $request->input('welcome_message') : "Welcome";

        //        if ($request->has('valve_anti_cheat')) {
        //            $data['valve_anti_cheat'] = (bool) $request->input('valve_anti_cheat');
        //        } else {
        //            $data['valve_anti_cheat'] = 0;
        //        }
        $data['valve_anti_cheat'] =
            (bool) $request->has('valve_anti_cheat') ? $request->input('valve_anti_cheat') : 0;

        $data['mission'] = (string) $request->input('mission');

        //        if ($request->has('max_players')) {
        //            $data['max_players'] = (int) $max_players;
        //        } else {
        //            $data['max_players'] = 32;
        //        }
        $data['max_players'] = (int) $request->has('max_players') ? $request->input('max_players') : 32;

        $data['port'] = (int) $request->input('port');

        //        if ($request->has('steam_port')) {
        //            $data['steam_port'] = (int) $request->input('steam_port');
        //        }else{
        //            $data['steam_port'] = false;
        //        }
        $data['steam_port'] = (int) $request->has('steam_port') ? $request->input('steam_port') : false;

        return response()
            ->view('warband.native', $data)
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public
    function store(
        Request $request
    ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function show(
        $id
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function edit(
        $id
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function update(
        Request $request, $id
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(
        $id
    ) {
        //
    }
}
