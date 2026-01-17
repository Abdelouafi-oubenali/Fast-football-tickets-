<header class="sticky top-0 z-50 w-full bg-white shadow-sm px-3 md:px-6 py-2 flex items-center justify-between">

    <!-- LEFT -->
    <div class="flex items-center gap-3 md:gap-10">

        <!-- LOGO -->
        <a href="/" class="text-xl md:text-2xl font-bold font-unbounded text-orange">
            FootTicket
        </a>

        <!-- SEARCH (DESKTOP ONLY) -->
        <div class="hidden lg:flex border border-[#b2b2b2] rounded-full bg-gray-50 items-center gap-2 px-4 py-1">
            
            <!-- Search match -->
            <div class="flex items-center gap-2 w-[260px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <form method="GET" action="{{ route('home') }}" class="w-full">
                    <input
                        type="text"
                        name="search"
                        placeholder="Search for match"
                        value="{{ request('search') }}"
                        class="h-[35px] w-full outline-none border-none text-sm bg-transparent"
                    >
                </form>
            </div>

            <div class="w-px h-[32px] bg-[#B2B2B2]"></div>

            <!-- Search event -->
            <div class="flex items-center gap-2 w-[260px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                <form method="GET" action="#" class="w-full flex items-center gap-2">
                    <input
                        type="text"
                        name="event_search"
                        placeholder="Search for events"
                        class="h-[35px] w-full outline-none border-none text-sm bg-transparent"
                    >
                    <button type="submit" class="w-[34px] h-[34px] bg-green-600 rounded-full flex items-center justify-center hover:bg-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="white" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- RIGHT -->
    <nav class="flex items-center">
        <ul class="flex gap-4 md:gap-7 items-center">
            @auth
                <li>
                    <a href="/historique" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6 md:w-7 md:h-7 text-darkblue hover:text-orange">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                    </a>
                </li>


                <li class="relative">
                    <button class="circl_nv w-[38px] h-[38px] md:w-[42px] md:h-[42px] rounded-full overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-full h-full object-cover" alt="avatar">
                    </button>

                    <!-- DROPDOWN -->
                    <div class="menu_nv absolute right-0 top-full mt-2 bg-white border border-gray-300 hidden">
                        <ul class="w-60">
                            <li class="px-4 py-3 hover:bg-gray-100">
                                {{ Auth::user()->nom }}<br>
                                <small>{{ Auth::user()->email }}</small>
                            </li>
                            <li class="px-4 py-3 hover:bg-gray-100">
                                <a href="/setting/profile">Settings</a>
                            </li>
                            <li class="px-4 py-3 hover:bg-gray-100">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            @endauth

            @guest
                <li>
                    <a href="/login" class="text-orange font-medium">Login</a>
                </li>
                <li>
                    <a href="/register" class="text-orange font-medium">Register</a>
                </li>
            @endguest
        </ul>
    </nav>
</header>