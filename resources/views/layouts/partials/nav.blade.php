<nav-template inline-template>
    <nav class="flex items-center justify-between flex-wrap bg-gray-700 p-6">
        <div class="flex items-center flex-shrink-0 text-gray-300 mr-6">
            <svg class="fill-current h-6 w-6 mr-2"width="54px" height="54px" viewBox="279 369 54 54" enable-background="new 279 369 54 54" xml:space="preserve"> <path fill="#E2E8F0" d="M331.367,380.864h-15.135l1.681,11.913c0.981,7.148-4.624,13.594-11.772,13.594l0,0 c-7.288,0-12.753-6.446-11.773-13.594l1.682-11.913h-15.417l-1.401,9.811c-2.102,16.257,10.371,30.692,26.769,30.692l0,0 c16.397,0,28.872-14.436,26.769-30.552L331.367,380.864z"/> <g> <polygon fill="#FFFFFF" points="331.509,381.424 329.965,370.633 314.83,370.633 316.233,381.424  "/> <polygon fill="#FFFFFF" points="295.77,381.424 297.171,370.633 282.035,370.633 280.494,381.424  "/> </g> </svg>

            <a href=" {{ route('home')  }} ">
                <span class="font-semibold text-3xl tracking-tight"> MediaMagnaat </span>
            </a>
        </div>
        <div class="block lg:hidden" @click="toggleHidden">
            <button class="flex items-center px-3 py-2 border rounded text-gray-400 border-yellow-400 hover:text-white hover:border-white" >
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
        <div id="nav-content" class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" :class="{'hidden' : isHidden}">
            <div class="text-sm lg:flex-grow">
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-white mr-4">
                    Docs
                </a>
                <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-gray-400 hover:text-white mr-4">
                    Examples
                </a>
            </div>
            <div class="border-t mt-8 text-center lg:border-0 lg:mt-0">
                @guest
                    <a href=" {{ route('login') }} " class="inline-block text-sm px-4 py-2 leading-none rounded text-white hover:text-gray-800 hover:bg-gray-100"> Login </a>
                    <a href=" {{ route('register') }} " class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-800 hover:bg-white mt-4 lg:mt-0">Register</a>
                @else
                    <a class="inline-block text-sm px-4 py-2 leading-none rounded text-white hover:text-gray-800 hover:bg-gray-100" href="#" >Beheer profiel</a>
                    <a class="inline-block text-sm px-4 py-2 leading-none rounded text-white hover:text-gray-800 hover:bg-gray-100" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</nav-template>


