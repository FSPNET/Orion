@extends('layouts.app')

@section('content')
{
    "name": "{{ $name }}",
    "description": "{{ $description}}",
    "tags": ["{!! $tags !!}"],

    "_comment_max_players": "Maximum number of players allowed, admins can join even a full server. 0 means unlimited.",
    "max_players": {{ $max_players }},

    "_comment_visibility": ["public: Game will be published on the official Factorio matching server",
    "lan: Game will be broadcast on LAN"],
    "visibility":
    {
        "public": {{ $public }},
        "lan": {{ $lan }}
    },

    "_comment_token": "Authentication token. May be used instead of 'password' above.",
    "token": "{{ $token }}",

    "game_password": "{{ $game_password }}",

    "_comment_require_user_verification": "When set to true, the server will only allow clients that have a valid Factorio.com account",
    "require_user_verification": {{ $require_user_verification }},

    "_comment_max_upload_in_kilobytes_per_second" : "optional, default value is 0. 0 means unlimited.",
    "max_upload_in_kilobytes_per_second": {{ $max_upload_in_kilobytes_per_second }},

    "_comment_minimum_latency_in_ticks": "optional one tick is 16ms in default speed, default value is 0. 0 means no minimum.",
    "minimum_latency_in_ticks": {{ $minimum_latency_in_ticks }},

    "_comment_ignore_player_limit_for_returning_players": "Players that played on this map already can join even when the max player limit was reached.",
    "ignore_player_limit_for_returning_players": {{ $ignore_player_limit_for_returning_players }},

    "_comment_allow_commands": "possible values are, true, false and admins-only",
    "allow_commands": "{{ $allow_commands }}",

    "_comment_autosave_interval": "Autosave interval in minutes",
    "autosave_interval": {{ $autosave_interval }},

    "_comment_autosave_slots": "server autosave slots, it is cycled through when the server autosaves.",
    "autosave_slots": {{ $autosave_slots }},

    "_comment_afk_autokick_interval": "How many minutes until someone is kicked when doing nothing, 0 for never.",
    "afk_autokick_interval": {{ $afk_autokick_interval }},

    "_comment_auto_pause": "Whether should the server be paused when no players are present.",
    "auto_pause": {{ $auto_pause }},

    "only_admins_can_pause_the_game": {{ $only_admins_can_pause_the_game }},

    "_comment_autosave_only_on_server": "Whether autosaves should be saved only on server or also on all connected clients. Default is true.",
    "autosave_only_on_server": {{ $autosave_only_on_server }},

    "_comment_non_blocking_saving": "Highly experimental feature, enable only at your own risk of losing your saves. On UNIX systems, server will fork itself to create an autosave. Autosaving on connected Windows clients will be disabled regardless of autosave_only_on_server option.",
    "non_blocking_saving": {{ $non_blocking_saving }},

    "_comment_admins": "List of case insensitive usernames, that will be promoted immediately",
    "admins": ["{!! $admins !!}"]
}
@endsection
