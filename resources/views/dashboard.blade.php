@extends('layouts.app')

@section('content')
    <div class="container md:flex mx-auto mt-6">
        <div class="px-4 py-2 text-center text-gray-600 w-full">
            <h1 class="text-2xl sm:text-xl md:text-2xl lg:text-4xl xl:text-5xl antialiased  tracking-tight font-semibold"> Beheer interactieve videos </h1>
            <p class="italic mt-2 text-gray-600">"Pellentesque posuere. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Nullam accumsan lorem in dui. Vivamus quis mi."</p>

            <new-project-button
                inline-template
            >
                <button class="inline-block w-full px-8 py-2 mt-6 md:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold rounded"
                        @click="newProjectInModal"
                >
                    Start een nieuw project
                </button>
            </new-project-button>

            <manage-project-modal>
            </manage-project-modal>
        </div>
    </div>
    <div class="container mx-auto">

            <projects-by-user
                :projects = " {{ json_encode($projects) }} "
                inline-template
            >
                <div class="mt-8 text-left">
                    <h2 class="ml-2 text-xl sm:text-base md:text-xl lg:text-2xl xl:text-3xl antialiased tracking-tight font-semibold text-gray-700 underline"> Jouw Projecten: </h2>
                    <div class="relative w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100" v-for="project in projects" :key="project.id">
                        <a :href="'project/' + project.id + '/edit'" class="">
                            <div class="">
                                <img class="" :src="thumbnail(project)" alt="">
                            </div>
                            <div class="p-2 absolute top-0 bottom-0 left-0 right-0">
                                <div class="w-full h-full bg-gray-600 hover:bg-blue-900 opacity-75 hover:opacity-100"></div>
                            </div>
                            <div class="block absolute top-0 bottom-0 left-0 right-0">
                                <div class="w-full h-full">
                                    <div class="text-2xl mb-2 h-16 overflow-hidden text-center p-10">
                                        @{{ project.title }}
                                    </div>
                                    <span class=" absolute bottom-0 left-0 right-0 text-center p-10">
                                        <span class="px-6 py-1 bg-white hover:bg-gray-200 text-black rounded shadow">
                                            @{{ cardCounter(project) }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </projects-by-user>


    </div>

@endsection
