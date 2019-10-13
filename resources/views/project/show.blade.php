@extends('layouts.app')

@section('content')
    <div class="container md:flex md:flex-row-reverse mx-auto mt-6">
        <div class="">
            <img src="/img/page.svg" class="w-full" alt="">
        </div>
        <div class="px-4 py-2 lg:w-1/2 text-center lg:text-left text-gray-600">
            <div class="lg:pl-24 lg:py-16">
                <h1 class="text-2xl sm:text-xl md:text-2xl lg:text-4xl xl:text-6xl antialiased tracking-tight font-semibold"> {{ $project->title }} </h1>
                <p class="italic text-gray-600 py-4"> {{ $project->description }} </p>

                <div class="w-full flex justify-between mt-2 pb-4">
                    <span>
                         cards
                    </span>
                    <edit-project-button
                        :project = "{{ json_encode($project)  }}"
                        inline-template
                    >
                        <i class="material-icons clickable" @click="editProjectInModal">
                            edit
                        </i>
                    </edit-project-button>
                </div>

                <a href=" # " class="inline-block w-full px-8 mr-4 lg:w-auto bg-secondary hover:bg-secondary-dark text-white font-bold py-2 rounded"> Start test </a>
                <new-publication inline-template>
                    <button class="inline-block w-full px-8 lg:w-auto bg-gray-200 hover:bg-blue-700 text-gray-700 hover:text-white font-bold py-2 rounded"
                            @click="openNewCardModal"
                    >
                        Add a Publication
                    </button>
                </new-publication>

                <manage-project-modal>
                </manage-project-modal>



            </div>
        </div>
    </div>


@endsection
