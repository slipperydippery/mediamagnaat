@extends('layouts.video')

@section('content')

    <player-container

        :project = " {{ json_encode($project) }} "
    >
    </player-container>

@endsection
