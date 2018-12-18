// ****************************************************************************
//                                                                            *
//     Arma 3 - server.cfg
//     {{ $create_time }}
//     {{ trans('common.generated_by') }}
//                                                                            *
// ****************************************************************************

// ArmA 3 Server Config File
//
// More info about parameters:
// https://community.bistudio.com/wiki/server.cfg


// GENERAL SETTINGS

// Hostname for server.
hostname = "{{ $hostname }}";

// Server password - for private servers.
//password = "arma3pass";

// Admin Password
passwordAdmin = "{{ $passwordAdmin }}";

// Auto-admin
admins[] = {"{!! $admins !!}"};

// Server Slots
maxPlayers = {{ $maxPlayers }};

// Logfile
logFile = "{{ $logFile }}";

// Minimum Required Client Build
//requiredBuild = 95691

// Message of the Day (MOTD)
motd[] = {
    "{!! $motd !!}"
};

// MOTD Interval (Seconds)
motdInterval = {{ $motdInterval }};


// VOTING

// Server Mission Start
//  minimum number of clients before server starts mission
voteMissionPlayers = {{ $voteMissionPlayers }};

// Accepted Vote Threshold
//  0.33 = 33% clients.
voteThreshold = {{ $voteThreshold }};

// INGAME SETTINGS

// Disable Voice over Net (VoN)
//  0 = voice enabled.
//  1 = voice disabled.
disableVoN = {{ $disableVoN }};

// VoN Codec Quality
//  0-10 = 8kHz (narrowband).
//  11-20 = 16kHz (wideband).
//  21-30 = 32kHz (ultrawideband).
vonCodecQuality = {{ $vonCodecQuality }};

// Persistent Battlefield
//  0 = disable.
//  1 = enable.
persistent = {{ $persistent }};

// Time Stamp Format
//  none, short, full
timeStampFormat = "{{ $timeStampFormat }}";

// Server Statistics
//  Set this to 0 to opt-out! More info: https://community.bistudio.com/wiki/Arma_3_Analytics
statisticsEnabled = {{ $statisticsEnabled }};

// SERVER SECURITY/ANTI HACK

// Verify Signitures for Client Addons
//  0 = off.
//  1 = weak protection (depricated).
//  2 = full protection.
verifySignatures = {{ $verifySignatures }};

// Secure Player ID
//  1 = Server warning message.
//  2 = Kick client.
requiredSecureId = {{ $requiredSecureId }};

// Kick Duplicate Player IDs
kickDuplicate = {{ $kickDuplicate }};

// BattlEye Anti-Cheat
//  0 = disable
//  1 = enable
BattlEye = {{ $BattlEye }};

// Allowed File Extentions
allowedLoadFileExtensions[] = {"hpp","sqs","sqf","fsm","cpp","paa","txt","xml","inc","ext","sqm","ods","fxy","lip","csv","kb","bik","bikb","html","htm","biedi"};
allowedPreprocessFileExtensions[] = {"hpp","sqs","sqf","fsm","cpp","paa","txt","xml","inc","ext","sqm","ods","fxy","lip","csv","kb","bik","bikb","html","htm","biedi"};
allowedHTMLLoadExtensions[] = {"htm","html","xml","txt"};

// SCRIPTING ISSUES
onUserConnected = "";
onUserDisconnected = "";
doubleIdDetected = "";

// SIGNATURE VERIFICATION
// kick = kick (_this select 0)
// ban = ban (_this select 0)
onUnsignedData = "kick (_this select 0)";
onHackedData = "kick (_this select 0)";
onDifferentData = "";

// HEADLESS CLIENT SUPPORT
// specify ip-adresses of allowed headless clients
// if more than one:
// headlessClients[] = {"127.0.0.1", "192.168.0.1"};
// localClient[] = {"127.0.0.1", "192.168.0.1"};
headlessClients[] = {"127.0.0.1"};
localClient[] = {"127.0.0.1"};
battleyeLicense = 1;