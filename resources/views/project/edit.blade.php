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
                    <edit-project-button
                        :project = "{{ json_encode($project)  }}"
                        inline-template
                    >
                        <span>
                            <i class="material-icons clickable" @click="editProjectInModal">
                                edit
                            </i>
                            <manage-project-modal
                                :slugs="{{ json_encode($slugs) }}"
                            >
                            </manage-project-modal>
                            </span>
                    </edit-project-button>

                </div>

                <a href=" {{ route('project.show', $project) }} " class="inline-block w-full px-8 mr-4 lg:w-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 rounded"> Bekijk project </a>

                <a href=" {{ route('layout.edit', $project->layout) }} " class="inline-block w-full px-8 lg:w-auto bg-gray-200 hover:bg-blue-700 text-gray-700 hover:text-white font-bold py-2 rounded"> bewerk layout </a>

                <manage-publication-modal
                    :project_slug = "{{ json_encode($project->slug)  }}"
                    :project_id = "{{ json_encode($project->id)  }}"
                    :entrypoint = "{{ $project->publications->count() === 0 ? 1 : 0 }}"
                >
                </manage-publication-modal>




            </div>
        </div>
    </div>
    <new-publication-button inline-template>
        <button class="inline-block w-full px-8 lg:w-auto bg-gray-200 hover:bg-blue-700 text-gray-700 hover:text-white font-bold py-2 rounded"
                @click="newPublicationInModal"
        >
            Voeg een publicatie toe
        </button>
    </new-publication-button>

    <publications-tree
        :project = " {{ json_encode($project) }} "
    >
    </publications-tree>


@endsection
