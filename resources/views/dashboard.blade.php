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
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 inline-block p-2 text-gray-100" v-for="project in projects" :key="project.id">
                        <a :href="'project/' + project.id" class="block bg-gray-600 hover:bg-gray-700 rounded shadow p-4">
                            <span class="icons flex flex-row-reverse pb-4 text-gray-400">
                                <span class="pr-2">
                                    @{{ cardCounter(project) }}
                                </span>
                                <i class="material-icons pr-1">
                                    lock_open
                                </i>

                            </span>
                            <div class="text-2xl mb-2 h-16 overflow-hidden text-center"> @{{ project.title }} </div>
                        </a>
                    </div>
                </div>
            </projects-by-user>


    </div>

@endsection
