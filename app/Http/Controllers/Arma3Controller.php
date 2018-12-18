<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Arma3Controller extends Controller
{
    public function server(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hostname'              => 'sometimes|filled|required|string|min:3|max:100',
            'password'              => 'sometimes|filled|required|string|min:8|max:30',
            'passwordAdmin'         => 'sometimes|filled|required|string|min:8|max:30',
            'admins'                => 'sometimes|filled|required|string|min:3',
            'serverCommandPassword' => 'sometimes|filled|required|string|min:8|max:30',
            'logFile'               => 'sometimes|filled|required|string|min:8|max:30',
            'motd'                  => 'sometimes|filled|required|string|min:3',
            'motdInterval'          => 'sometimes|filled|required|numeric|min:1|max:2147483647',
            'maxPlayers'            => 'sometimes|filled|required|numeric|min:1|max:2147483647',
            'kickDuplicate'         => 'sometimes|filled|required|boolean',
            'verifySignatures'      => 'sometimes|filled|required|numeric|min:0|max:2',
            'requiredSecureId'      => 'sometimes|filled|required|numeric|min:1|max:2',
            'allowedFilePatching'   => 'sometimes|filled|required|numeric|min:0|max:2',
            'voteMissionPlayers'    => 'sometimes|filled|required|numeric|min:1',
            'voteThreshold'         => 'sometimes|filled|required|numeric',
            'disableVoN'            => 'sometimes|filled|required|boolean',
            'vonCodec'              => 'sometimes|filled|required|numeric|min:0|max:1',
            'vonCodecQuality'       => 'sometimes|filled|required|numeric|min:0|max:30',
            'persistent'            => 'sometimes|filled|required|boolean',
            'timeStampFormat'       => [
                'sometimes',
                'filled',
                'required',
                'string',
                'min:4',
                'max:5',
                'regex:(^none$|^short$|^full$)',
            ],
            'BattlEye'              => 'sometimes|filled|required|numeric|min:0|max:1',
            'disconnectTimeout'     => 'sometimes|filled|required|numeric|min:5|max:90',
        ]);

        $errors = $validator->errors();

        if ($errors->count()) {
            return $errors->all();
        }

        $data['create_time'] = $this->time;
        $data['hostname'] = (string) $request->has('hostname') ? $request->input('hostname') : 'SERVERNAME';
        $data['password'] = (string) $request->has('password') ? $request->input('password') : '';
        $data['passwordAdmin'] =
            (string) $request->has('passwordAdmin') ? $request->input('passwordAdmin') : 'ADMINPASSWORD';
        $data['admins'] = (string) $request->has('admins') ? str_replace(',', '","', $request->input('admins')) : '';
        $data['maxPlayers'] = (int) $request->has('maxPlayers') ? $request->input('maxPlayers') : '32';
        $data['logFile'] = (string) $request->has('logFile') ? $request->input('logFile') : 'arma3server.log';
        $data['motd'] = (string) $request->has('motd') ? str_replace(',', '","', $request->input('motd')) : 'Welcome to My Arma 3 Server';
        $data['motdInterval'] = (int) $request->has('motdInterval') ? $request->input('motdInterval') : '30';
        $data['voteMissionPlayers'] =
            (int) $request->has('voteMissionPlayers') ? $request->input('voteMissionPlayers') : '1';
        $data['voteThreshold'] = (int) $request->has('voteThreshold') ? $request->input('voteThreshold') : '0.33';
        $data['disableVoN'] = (int) $request->has('disableVoN') ? $request->input('disableVoN') : '0';
        $data['vonCodecQuality'] = (int) $request->has('vonCodecQuality') ? $request->input('vonCodecQuality') : '3';
        $data['persistent'] = (int) $request->has('persistent') ? $request->input('persistent') : '1';
        $data['timeStampFormat'] =
            (int) $request->has('timeStampFormat') ? $request->input('timeStampFormat') : 'short';
        $data['statisticsEnabled'] =
            (int) $request->has('statisticsEnabled') ? $request->input('statisticsEnabled') : '1';
        $data['verifySignatures'] = (int) $request->has('verifySignatures') ? $request->input('verifySignatures') : '2';
        $data['requiredSecureId'] = (int) $request->has('requiredSecureId') ? $request->input('requiredSecureId') : '2';
        $data['kickDuplicate'] = (int) $request->has('kickDuplicate') ? $request->input('kickDuplicate') : '1';
        $data['BattlEye'] = (int) $request->has('BattlEye') ? $request->input('BattlEye') : '1';

        return response()
            ->view('arma3.server', $data)
            ->header('Content-Type', 'text/plain');
    }

    public function network(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'MinBandwidth'         => 'sometimes|filled|required|numeric',
            'MaxBandwidth'         => 'sometimes|filled|required|numeric',
            'MaxMsgSend'           => 'sometimes|filled|required|numeric',
            'MaxSizeGuaranteed'    => 'sometimes|filled|required|numeric',
            'MaxSizeNonguaranteed' => 'sometimes|filled|required|numeric',
            'MinErrorToSend'       => 'sometimes|filled|required|numeric',
            'MinErrorToSendNear'   => 'sometimes|filled|required|numeric',
            'serverLatitude'       => 'sometimes|filled|required|numeric',
            'serverLatitudeAuto'   => 'sometimes|filled|required|numeric',
            'serverLongitude'      => 'sometimes|filled|required|numeric',
            'serverLongitudeAuto'  => 'sometimes|filled|required|numeric',
            'viewDistance'         => 'sometimes|filled|required|numeric',
            'MaxCustomFileSize'    => 'sometimes|filled|required|numeric',
            'language'             => 'sometimes|filled|required|string|min:4:max:10',
            'steamLanguage'        => 'sometimes|filled|required|string|min:4:max:10',
            'adapter'              => 'sometimes|filled|required|numeric',
            'Windowed'             => 'sometimes|filled|required|numeric',
            '3D_Performance'       => 'sometimes|filled|required|numeric',
        ]);
        $errors = $validator->errors();

        if ($errors->count()) {
            return $errors->all();
        }

        $data['create_time'] = $this->time;
        $data['MinBandwidth'] = (int) $request->has('MinBandwidth') ? $request->input('MinBandwidth') : '5120000';
        $data['MaxBandwidth'] = (int) $request->has('MaxBandwidth') ? $request->input('MaxBandwidth') : '10240000';
        $data['MaxMsgSend'] = (int) $request->has('MaxMsgSend') ? $request->input('MaxMsgSend') : '2048';
        $data['MaxSizeGuaranteed'] =
            (int) $request->has('MaxSizeGuaranteed') ? $request->input('MaxSizeGuaranteed') : '512';
        $data['MaxSizeNonguaranteed'] =
            (int) $request->has('MaxSizeNonguaranteed') ? $request->input('MaxSizeNonguaranteed') : '256';
        $data['MinErrorToSend'] = (int) $request->has('MinErrorToSend') ? $request->input('MinErrorToSend') : '0.01';
        $data['MinErrorToSendNear'] =
            (int) $request->has('MinErrorToSendNear') ? $request->input('MinErrorToSendNear') : '0.02';
        $data['serverLatitude'] = (int) $request->has('serverLatitude') ? $request->input('serverLatitude') : '52';
        $data['serverLatitudeAuto'] =
            (int) $request->has('serverLatitudeAuto') ? $request->input('serverLatitudeAuto') : '52';
        $data['serverLongitude'] = (int) $request->has('serverLongitude') ? $request->input('serverLongitude') : '0';
        $data['serverLongitudeAuto'] =
            (int) $request->has('serverLongitudeAuto') ? $request->input('serverLongitudeAuto') : '0';
        $data['viewDistance'] = (int) $request->has('viewDistance') ? $request->input('viewDistance') : '10000';
        $data['MaxCustomFileSize'] =
            (int) $request->has('MaxCustomFileSize') ? $request->input('MaxCustomFileSize') : '0';
        $data['language'] = (string) $request->has('language') ? $request->input('language') : 'English';
        $data['steamLanguage'] = (string) $request->has('steamLanguage') ? $request->input('steamLanguage') : 'English';
        $data['adapter'] = (int) $request->has('adapter') ? $request->input('adapter') : '-1';
        $data['Windowed'] = (int) $request->has('Windowed') ? $request->input('Windowed') : '0';
        $data['Performance'] =
            (int) $request->has('3D_Performance') ? $request->input('3D_Performance') : '1.000000';

        return response()
            ->view('arma3.network', $data)
            ->header('Content-Type', 'text/plain');
    }
}
