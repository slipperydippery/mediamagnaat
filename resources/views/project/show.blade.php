@extends('layouts.video')

@section('content')

    <player-container
        :project = " {{ json_encode($project) }} "
        :layout = " {{ json_encode($project->layout) }} "
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

            <div class="fixed right-0 bottom-0 left-0 top-0 " v-if="! playing">
                <img :src="activePublication.publicationable.thumbnail" alt="" class="object-cover h-full w-full" ref="videooverlay">
                <div
                    class="absolute top-0 left-0 bottom-0 right-0 flex flex-col items-center justify-center"
                    :style="{ background: layout.bg_color,
                                color: layout.text_color,
                                padding: inPixels(layout.padding_y) + ' ' + inPixels(layout.padding_x)
                                 }"
                    @click.self="togglePlayPause"
                >
                    <div class="w-full" v-if="layout.title_show">
                        <div class="clickable inline-block font-bold"
                             :class="{'w-full': layout.title_fullwidth, 'w-auto': ! layout.title_fullwidth, 'absolute left-0': layout.title_absolute, 'bottom-0': layout.title_bottom,
                                 'top-0': ! layout.title_bottom, 'text-center mx-auto': layout.title_center}"
                             :style="{
                                    background: layout.title_background_color,
                                    padding: inPixels(layout.title_padding_y) + ' ' + inPixels(layout.title_padding_x),
                                    color: layout.title_text_color,
                                    'font-size': inPixels(layout.title_size),
                                }"
                        >
                            @{{ activePublication.title  }}
                        </div>
                    </div>



                    <div class="flex-1 flex py-5 items-center">
                        <div class="w-1/3 mr-4" :class="{'h-full': layout.sidebar_fullheight}" v-if="layout.sidebar_show">
                            <div class="overflow-hidden"
                                 :class="{'h-full': layout.sidebar_fullheight}"
                                 :style="{
                                    background: layout.sidebar_background_color,
                                    color: layout.sidebar_text_color,
                                    'font-size': inPixels(layout.sidebar_description_size),
                                    padding: inPixels(layout.sidebar_padding_y) + ' ' + inPixels(layout.sidebar_padding_x),
                                }">
                                <vue-markdown :source="activePublication.description"></vue-markdown>

                            </div>
                        </div>
                        <div :class="{'w-2/3': layout.sidebar_show}"
                             :style="{
                                    'margin': '0 -' + inPixels(layout.card_margin_x)
                                }"
                        >
                            <div class="inline-block clickable"
                                 v-for="child in children"
                                 :style="{
                                            padding: '0px 0px ' + inPixels(layout.card_margin_y) + ' ' + inPixels(layout.card_margin_x),
                                            width: (100 / layout.cols) + '%',
                                            'max-height': 30 + '%'
                                            }"
                            >
                                <div class="relative overflow-hidden"
                                     :style="{
                                            'border-width': layout.border_width + 'px',
                                            'border-color': layout.border_color,
                                            'border-radius': layout.border_radius + 'px',
                                            'box-shadow': '0 0 ' + inPixels(layout.card_shadow_size) + ' ' + layout.card_shadow_color,
                                         }"
                                         @click="setActivePublication(child)"
                                >
                                    <img :src="child.publicationable.thumbnail" alt="" class="object-cover h-full w-full">
                                    <div class="bg-white absolute bottom-0 w-full"
                                         :style="{
                                                'height': layout.info_height + '%',
                                                'padding': inPixels(layout.info_padding_y) + ' ' + inPixels(layout.info_padding_x),
                                                'background': layout.info_background_color,
                                             }"
                                    >
                                        <h3 class="truncate font-semibold"
                                            v-if="layout.info_title_show"
                                            :style="{
                                                    'font-size': inPixels(layout.info_title_size),
                                                    'color': layout.info_title_color
                                                }"
                                        >
                                            @{{ child.title }}
                                        </h3>
                                        <p class="relative"
                                           v-if="layout.description_show"
                                           :style="{
                                                    'font-size': inPixels(layout.description_size),
                                                    'color': layout.description_color
                                                }"
                                        >
                                            @{{ stringlimit('Sit gravida maecenas tortor urna lorem euismod molestie enim tincidunt dolor ut sem leo enim nulla maecenas ipsum cursus vivamus rutrum bibendum nisi sed purus.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full"
                        v-if="parent"
                        @click="setActivePublication(parent)"
>
                        <div class="clickable inline-block font-bold"
                             :class="{'w-full': layout.back_fullwidth, 'w-auto': ! layout.back_fullwidth, 'absolute left-0': layout.back_absolute, 'bottom-0': layout.back_bottom, 'top-0': ! layout.back_bottom}"
                             :style="{
                                    background: layout.back_background_color,
                                    padding: inPixels(layout.back_padding_y) + ' ' + inPixels(layout.back_padding_x),
                                    color: layout.back_text_color,
                                }"
                        >
                            @{{ layout.back_text }} <span v-if="layout.back_include_title"> @{{ parent.title }} </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </player-container>

@endsection
