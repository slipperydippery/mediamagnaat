@extends('layouts.video')

@section('content')

    <player-container
        :project = " {{ json_encode($project) }} "
        inline-template
    >
        <div class="w-full h-full">
            <show-video
                :video=activePublication.publicationable.link
                :playing=playing
                @playing="playing = true"
                @pausing="playing = false"
                v-if="activePublication.publicationable.link != null"
            >
            </show-video>

            <div class="fixed top-0 left-0 bottom-0 right-0 bg-gray-500 p-20"
                 @click.self="togglePlayPause" v-if="! playing"
            >
                <div class="w-full bg-white clickable"
                     v-if="parent"
                     @click="setActivePublication(parent)"

                >
                    << terug naar @{{ parent.title }}
                </div>
                <div class="p-2 inline-block w-1/4" v-for="child in children">
                    <div class="bg-white p-2 rounded shadow clickable"
                         @click="setActivePublication(child)"
                    >
                        @{{ child.title }}
                    </div>
                </div>
            </div>
        </div>
    </player-container>

@endsection
