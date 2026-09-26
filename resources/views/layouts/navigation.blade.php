<nav x-data="{ open: false }"
    class="border-b"
    style="
        background: {{ auth()->user()->role === 'manager' ? '#1F2A44' : '#4b2e22' }};
        border-color: {{ auth()->user()->role === 'manager' ? '#C6A75E' : '#6b4636' }};
    ">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}"
                        class="text-xl font-bold"
                        style="
                            color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                            text-decoration: none;
                        ">
                        Leave Management
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                        style="
                            color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                            text-decoration: none;
                        ">
                        Dashboard
                    </a>


                    <!-- Employee Links -->
                    @if(auth()->user()->role === 'employee')

                        <a href="{{ route('employee.apply-leave') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                            style="
                                color: #f8eee2;
                                text-decoration: none;
                            ">
                            Apply Leave
                        </a>

                        <a href="{{ route('employee.leaves') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                            style="
                                color: #f8eee2;
                                text-decoration: none;
                            ">
                            My Leaves
                        </a>

                    @endif


                    <!-- Manager Links -->
                    @if(auth()->user()->role === 'manager')

                        <a href="{{ route('manager.employees') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                            style="
                                color: #E8DCC8;
                                text-decoration: none;
                            ">
                            Employees
                        </a>

                        <a href="{{ route('manager.leave-types') }}"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                            style="
                                color: #E8DCC8;
                                text-decoration: none;
                            ">
                            Leave Types
                        </a>

                    @endif


                    <!-- Profile -->
                    <a href="{{ route('profile.edit') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                        style="
                            color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                            text-decoration: none;
                        ">
                        Profile
                    </a>


                    <!-- Logout -->
                    <form method="POST"
                        action="{{ route('logout') }}"
                        class="inline-flex items-center">

                        @csrf

                        <button type="submit"
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium"
                            style="
                                color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                                background: none;
                                border: none;
                                cursor: pointer;
                            ">
                            Logout
                        </button>

                    </form>

                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md"
                    style="
                        color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                    ">

                    <svg class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />

                    </svg>

                </button>

            </div>

        </div>
    </div>


    <!-- Mobile Navigation -->
    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden"
        style="
            background: {{ auth()->user()->role === 'manager' ? '#1F2A44' : '#4b2e22' }};
        ">

        <div class="pt-2 pb-3 space-y-1">

            <!-- Dashboard -->
            <x-responsive-nav-link
                :href="route('dashboard')"
                style="
                    color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                ">
                Dashboard
            </x-responsive-nav-link>


            @if(auth()->user()->role === 'employee')

                <x-responsive-nav-link
                    :href="route('employee.apply-leave')"
                    style="color:#f8eee2;">
                    Apply Leave
                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('employee.leaves')"
                    style="color:#f8eee2;">
                    My Leaves
                </x-responsive-nav-link>

            @endif


            @if(auth()->user()->role === 'manager')

                <x-responsive-nav-link
                    :href="route('manager.employees')"
                    style="color:#E8DCC8;">
                    Employees
                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="route('manager.leave-types')"
                    style="color:#E8DCC8;">
                    Leave Types
                </x-responsive-nav-link>

            @endif


            <!-- Profile -->
            <x-responsive-nav-link
                :href="route('profile.edit')"
                style="
                    color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                ">
                Profile
            </x-responsive-nav-link>


            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <x-responsive-nav-link
                    :href="route('logout')"
                    style="
                        color: {{ auth()->user()->role === 'manager' ? '#E8DCC8' : '#f8eee2' }};
                    "
                    onclick="event.preventDefault();
                    this.closest('form').submit();">

                    Logout

                </x-responsive-nav-link>

            </form>

        </div>
    </div>

</nav>