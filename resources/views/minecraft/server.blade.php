@extends('layouts.app')

@section('content')
#Minecraft server properties
#{{ $create_time }}
generator-settings={{ $generator_settings }}
op-permission-level={{ $op_permission_level }}
allow-nether={{ $allow_nether }}
level-name={{ $level_name }}
enable-query={{ $enable_query }}
allow-flight={{ $allow_flight }}
prevent-proxy-connections={{ $prevent_proxy_connections }}
server-port={{ $server_port }}
max-world-size={{ $max_world_size }}
level-type={{ $level_type }}
enable-rcon={{ $enable_rcon }}
level-seed={{ $level_seed }}
force-gamemode={{ $force_gamemode }}
server-ip={{ $server_ip }}
network-compression-threshold={{ $network_compression_threshold }}
max-build-height={{ $max_build_height }}
spawn-npcs={{ $spawn_npcs }}
white-list={{ $white_list }}
spawn-animals={{ $spawn_animals }}
hardcore={{ $hardcore }}
snooper-enabled={{ $snooper_enabled }}
resource-pack-sha1={{ $resource_pack_sha1 }}
online-mode=true{{ $online_mode }}
resource-pack={{ $resource_pack }}
pvp={{ $pvp }}
difficulty={{ $difficulty }}
enable-command-block={{ $enable_command_block }}
gamemode={{ $gamemode }}
player-idle-timeout={{ $player_idle_timeout }}
max-players={{ $max_players }}
max-tick-time={{ $max_tick_time }}
spawn-monsters={{ $spawn_monsters }}
view-distance={{ $view_distance }}
generate-structures={{ $generate_structures }}
motd={{ $motd }}
@endsection
