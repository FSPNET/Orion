@extends('layouts.app')

@section('content')
{
    "terrain_segmentation": "{{ $terrain_segmentation }}",
    "water": "{{ $water }}",
    "width": {{ $width }},
    "height": {{ $height }},
    "starting_area": "{{ $starting_area }}",
    "peaceful_mode": {{ $peaceful_mode }},

    "autoplace_controls":
    {
        "coal": {"frequency": "{{ $coal }}", "size": "{{ $coal }}", "richness": "{{ $coal }}"},
        "stone": {"frequency": "{{ $stone }}", "size": "{{ $stone }}", "richness": "{{ $stone }}"},
        "copper-ore": {"frequency": "{{ $copper }}", "size": "{{ $copper }}","richness": "{{ $copper }}"},
        "iron-ore": {"frequency": "{{ $iron }}", "size": "{{ $iron }}", "richness": "{{ $iron }}"},
        "uranium-ore": {"frequency": "{{ $uranium }}", "size": "{{ $uranium }}", "richness": "{{ $uranium }}"},
        "crude-oil": {"frequency": "{{ $crude }}", "size": "{{ $crude }}", "richness": "{{ $crude }}"},
        "trees": {"frequency": "{{ $trees }}", "size": "{{ $trees }}", "richness": "{{ $trees }}"},
        "enemy-base": {"frequency": "{{ $enemy }}", "size": "{{ $enemy }}", "richness": "{{ $enemy }}"},
        "grass": {"frequency": "{{ $grass }}", "size": "{{ $grass }}", "richness": "{{ $grass }}"},
        "desert": {"frequency": "{{ $desert }}", "size": "{{ $desert }}", "richness": "{{ $desert }}"},
        "dirt": {"frequency": "{{ $dirt }}", "size": "{{ $dirt }}", "richness": "{{ $dirt }}"},
        "sand": {"frequency": "{{ $sand }}", "size": "{{ $sand }}", "richness": "{{ $sand }}"}
    },
    "cliff_settings":
    {
        "name": "{{ $cliff_name }}",
        "cliff_elevation_0": {{ $cliff_elevation }},
        "cliff_elevation_interval": {{ $cliff_elevation_interval }}
    },

    "seed": {{ $seed }}
}
@endsection
