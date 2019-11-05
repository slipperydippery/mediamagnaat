@extends('layouts.app')

@section('content')
    <layout-editor
        :inputlayout = "{{ json_encode($layout)  }}"
        inline-template
    >
        <div class="flex pb-16 pt-4">
            <div class="w-1/3 border p-4">
                <h1 class="text-2xl sm:text-xl md:text-2xl lg:text-4xl xl:text-6xl antialiased tracking-tight font-semibold"> {{ $project->title }} </h1>

                <h2 class="text-xl mt-4">Opzet</h2>
                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Achtergrond</span>
                    <verte v-model="layout.bg_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Text kleur</span>
                    <verte v-model="layout.text_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding breedte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.padding_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.padding_y" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Kolommen</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.cols" @input="updateLayout">
                </label>

                <hr class="my-4">
                <h2 class="text-xl mt-4">Sidebar</h2>
                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Sidebar laten zien</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.sidebar_show" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Volledige hoogte</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.sidebar_fullheight" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Achtergrond</span>
                    <verte v-model="layout.sidebar_background_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Text kleur</span>
                    <verte v-model="layout.sidebar_text_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Tekst grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.sidebar_description_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding breedte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.sidebar_padding_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.sidebar_padding_y" @input="updateLayout">
                </label>

                <hr class="my-4">
                <h2 class="text-xl mt-4">Titel</h2>
                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Titel laten zien</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.title_show" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Tekst grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.title_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding breedte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.title_padding_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.title_padding_y" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Achtergrond</span>
                    <verte v-model="layout.title_background_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Tekst kleur</span>
                    <verte v-model="layout.title_text_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Gecentreerd</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.title_center" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Aan videorand</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.title_absolute" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Onderaan de pagina</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.title_bottom" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Voledige breedte</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.title_fullwidth" @input="updateLayout">
                </label>

                <hr class="my-4">
                <h2 class="text-xl mt-4">Terug naar...</h2>
                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Terug tekst</span>
                    <input type="text" class="form-input mt-1 w-1/3" v-model="layout.back_text" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Terug tekst grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.back_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Titel voorgaande video toevoegen?</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.back_include_title" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Achtergrond</span>
                    <verte v-model="layout.back_background_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Tekst kleur</span>
                    <verte v-model="layout.back_text_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Aan videorand</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.back_absolute" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Onderaan de pagina</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.back_bottom" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Voledige breedte</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.back_fullwidth" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding breedte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.back_padding_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.back_padding_y" @input="updateLayout">
                </label>


                <hr class="my-4">
                <h2 class="text-xl">Kaarten</h2>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Border</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.border_width" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Border kleur</span>
                    <verte v-model="layout.border_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Ronde hoeken</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.border_radius" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Ruimte tussen kaarten horizontaal</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.card_margin_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Ruimte tussen kaarten vertikaal</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.card_margin_y" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Schaduw grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.card_shadow_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Schaduw kleur</span>
                    <verte v-model="layout.card_shadow_color" @input="updateLayout"></verte>
                </label>


                <hr class="my-4">
                <h2 class="text-xl">Kaarten Info</h2>
                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Info hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.info_height" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Info achtergrond</span>
                    <verte v-model="layout.info_background_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding breedte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.info_padding_x" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Padding hoogte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.info_padding_y" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Titel laten zien</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.info_title_show" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Titel grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.info_title_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Titel kleur</span>
                    <verte v-model="layout.info_title_color" @input="updateLayout"></verte>
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Beschrijving laten zien</span>
                    <input type="checkbox" class="form-checkbox" v-model="layout.description_show" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Beschrijving grootte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.description_size" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Beschrijving lengte</span>
                    <input type="number" class="form-input mt-1 w-1/3" v-model="layout.description_length" @input="updateLayout">
                </label>

                <label class="block w-full flex items-center">
                    <span class="text-gray-700 w-2/3">Beschrijving kleur</span>
                    <verte v-model="layout.description_color" @input="updateLayout"></verte>
                </label>


            </div>

            <div class="w-2/3 flex-col items-center justify-center">

                <label class="block w-full flex items-center">
                    <span class="text-gray-700">Kaarten in voorbeeld</span>
                    <input type="number" class="form-input mt-1" v-model="example.cardnumber">
                </label>

                <div class="fixed right-0 bottom-20 right-20 h-xs9 sm:h-sm9 md:h-md9 lg:h-md9 xl:h-xl9 w-xs16 sm:w-sm16 md:w-md16 lg:w-md16 xl:w-xl16" >
                    <img :src="background" alt="" class="object-cover h-full w-full" ref="videooverlay">
                    <div
                        class="absolute top-0 left-0 bottom-0 right-0 flex flex-col items-center justify-center"
                        :style="{ background: layout.bg_color,
                                color: layout.text_color,
                                padding: inPixels(layout.padding_y) + ' ' + inPixels(layout.padding_x)
                                 }"
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
                                Titel van deze video
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
                                    @php
                                    $string = 'Mi **massa** leo purus metus portaest ipsum dolor adipiscing
\
vivamus lorem varius accumsan nunc molestie elit ex arcu lacus eget sed erat dolor morbi quis.
\
Nunc interdum suspendisse consectetur tortor eu leo ex vivamus morbi tristique cursus purus elit vel magna sed nisl adipiscing et maecenas gravida purus sit nisi.
 \
[Im an inline-style link](https://www.google.com) nisl maecenas eget molestie portaest urna sed placerat varius cursus ac eu quisque ac congue euismod aliquam sit ipsum commodo euismod facilisis rutrum.'
                                    @endphp
                                    <vue-markdown source="<?= $string ?>"></vue-markdown>

                                </div>
                            </div>
                            <div :class="{'w-2/3': layout.sidebar_show}"
                                :style="{
                                    'margin': '0 -' + inPixels(layout.card_margin_x)
                                }"
                            >
                                <div class="inline-block clickable"
                                     v-for="card in Number(example.cardnumber)"
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
                                    >
                                        <img :src="backgrounds[card]" alt="" class="object-cover h-full w-full">
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
                                                Sample Title
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
                        <div class="w-full">
                            <div class="clickable inline-block font-bold"
                                 :class="{'w-full': layout.back_fullwidth, 'w-auto': ! layout.back_fullwidth, 'absolute left-0': layout.back_absolute, 'bottom-0': layout.back_bottom, 'top-0': ! layout.back_bottom}"
                                 :style="{
                                    background: layout.back_background_color,
                                    padding: inPixels(layout.back_padding_y) + ' ' + inPixels(layout.back_padding_x),
                                    color: layout.back_text_color,
                                    'font-size': inPixels(layout.back_size),
                                }"
                            >
                                @{{ layout.back_text }} <span v-if="layout.back_include_title">Titel vorige video</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout-editor>


@endsection
