# Create time : {{ $create_time }}
# {{ trans('common.generated_by') }}
#
#WARNING: Make sure that you change the capital values with proper ones.
#uncomment the line below when you set a valid administrator password
set_pass_admin {{ $pass_admin }}

#if you have premium members, set a password for them, otherwise delete/comment out the line below
#uncomment the line below when you set a valid private password
@if ($pass_private == 'PRIVATEPASS')
#set_pass_private PRIVATEPASS
@else
set_pass_private {{ $pass_private }}
@endif

#uncomment the line below when you set a valid server name
set_server_name {{ $server_name}}

#uncomment the line below when you set a valid welcome message
set_welcome_message {{ $welcome_message }}

#Steam must be running in order to use valve anti cheat
#Also you must use the Steam version of the dedicated server in order to use this option
set_enable_valve_anti_cheat {{ $valve_anti_cheat }}

#setting battle (multiplayer_bt) mode
set_mission multiplayer_{{ $mission }}

#setting max players, first one is non-premium member limit, second one is premium member limit
set_max_players {{ $max_players }} {{ $max_players }}

set_num_bots_voteable 20
set_map multi_scene_1
add_map multi_scene_2
add_map multi_scene_4
add_map multi_scene_7
add_map multi_scene_9
add_map multi_scene_11
add_map multi_scene_12
add_map random_multi_plain_medium
add_map random_multi_plain_large
add_map random_multi_steppe_medium
add_map random_multi_steppe_large
#adding all kingdoms to both sides just to randomize all of them
#adding less kingdoms will reduce the randomization set (used in set_randomize_factions command)
add_factions fac_kingdom_1 fac_kingdom_1
add_factions fac_kingdom_2 fac_kingdom_2
add_factions fac_kingdom_3 fac_kingdom_3
add_factions fac_kingdom_4 fac_kingdom_4
add_factions fac_kingdom_5 fac_kingdom_5
add_factions fac_kingdom_6 fac_kingdom_6
set_randomize_factions 1

#since default team point limit is 300, the line below is necessary for this mode
set_team_point_limit 10

#if the bottleneck is your server's bandwidth, then make sure that you set a correct value for upload limit
set_upload_limit 100000000

#if you are running more than one dedicated server on the same computer, you must give different ports to each of them
set_port {{ $port }}

#if you are running the Steam version of the dedicated server, this port must also be set, and same limitations of set_port apply for Steam port
@if ($port != false)
#set_steam_port {{ $port + 1}}
@else
set_steam_port {{ $port }}
@endif

set_server_log_folder Logs
set_server_ban_list_file Logs\ban_list.txt
start;

