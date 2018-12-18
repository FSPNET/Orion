// ****************************************************************************
//                                                                            *
//     Arma 3 - network.cfg
//     {{ $create_time }}
//     {{ trans('common.generated_by') }}
//                                                                            *
// ****************************************************************************

// Defines network tuning parameters
//
// This file is to be passed to the -cfg parameter on the command line for the server
// See http://community.bistudio.com/wiki/basic.cfg
// The following settings are the suggested settings

// BANDWIDTH SETTINGS

// Bandwidth the server is guaranteed to have (in bps)
// General guideline is NumberOfPlayers * 256kb
// Default: 131072
MinBandwidth={{ $MinBandwidth }};
// Bandwidth the server can never go above (in bps)
// For a single server, use full network speed; decrease when running multiple servers
MaxBandwidth={{ $MaxBandwidth }};

// PACKET SETTINGS

// Maximum number of packets per frame.
// Increasing the value potentially decreases lag, but increases desync
// Default: 128
MaxMsgSend={{ $MaxMsgSend }};
// Maximum payload of guaranteed packet (in b)
// Small messages are packed to larger packets
// Guaranteed packets are used for non-repetitive events, like shooting
// Lower value means more packets are sent, so less events will get combined
// Default: 512
MaxSizeGuaranteed={{ $MaxSizeGuaranteed }};
// Maximum payload of non-guaranteed packet (in b)
// Increasing this value may improve bandwidth requirement, but may also increase lag
// Largest factor in desync
// Guidance is half of MaxSizeGuaranteed
// Default: 256
MaxSizeNonguaranteed={{ $MaxSizeNonguaranteed }};
// Maximal size of a packet sent over the network
// Only necessary if ISP forces lower packet size and there are connectivity issues
// Default: 1400
// class sockets{maxPacketSize=1400};

// SMOOTHNESS SETTINGS

// Minimal error required to send network updates for far units
// Smaller values will make for smoother movement at long ranges, but will increase network traffic
// Default: 0.003
MinErrorToSend={{ $MinErrorToSend }};
// Minimal error required to send network updates for near units
// Using larger value can reduce traffic sent for near units
// Also controls client to server traffic
// Default: 0.01
MinErrorToSendNear={{ $MinErrorToSendNear }};

// GEOLOCATION SETTINGS

// Server latitude
serverLatitude={{ $serverLatitude }};
serverLatitudeAuto={{ $serverLatitudeAuto }};

// Server Longitude
serverLongitude={{ $serverLongitude }};
serverLongitudeAuto={{ $serverLongitudeAuto }};
// MISC
// View Distance (not sure if this actually works)
viewDistance={{ $viewDistance }};

// Maximum size (in b) for custom face or sound files
// Default: 0
MaxCustomFileSize={{ $MaxCustomFileSize }};
// Server language
language="{{ $language }}";
steamLanguage="{{ $steamLanguage }}";
// Adapter
adapter={{ $adapter }};
// Windowed mode
Windowed={{ $Windowed }};

3D_Performance={{ $Performance }};