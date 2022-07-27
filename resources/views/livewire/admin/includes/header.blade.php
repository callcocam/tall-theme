<header class="flex w-full h-16 relative z-50 bg-white ">
    <div
        class="w-full md:w-60 z-30 flex bg-[{{ config('theme.layouts.logo-bg', '#141414') }}] justify-start px-0 items-center border-b-1 border-r-1 border-gray-300 fixed  h-16 shadow-lg">
        <img class="flex h-full w-full" src="{{ asset(config('theme.layouts.logo')) }}" alt="Logo" />
    </div>
    <div class="hidden ml-60 w-full md:flex justify-between border-l-2 shadow-lg ">
        <div class="flex h-full flex-1">
            <ul class="flex items-center h-full w-full lg:w-7/12 justify-between">
                <li class="h-full w-full flex items-center">
                    <span
                        class="h-full px-2 text-2xl flex items-center transition-all ease-in-out duration-500 font-bold w-full justify-start">{{ $tenant->name }}</span>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="flex space-x-6 px-6 items-center w-full justify-between">
                <li>
                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg></a>
                </li>

                <li class="relative flex">
                    <div x-data="{ showDropdown: false }" @click.away="showDropdown = false">
                        <a href=""
                            class=" py-2 px-2 flex w-full items-center justify-between rounded hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500"
                            @click.prevent="showDropdown = ! showDropdown">
                            <div class="flex items-center">
                                <img class="flex w-12 h-12 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                    alt="User" />
                            </div>
                        </a>
                        <div class="overflow-hidden max-h-0 transition-all ease-in-out duration-200 absolute right-0 border-b-2 bg-white z-40 w-full md:w-72"
                            x-ref="dropdownContainer"
                            x-bind:style="showDropdown ? 'max-height: ' + $refs.dropdownContainer.scrollHeight + 'px' : ''">
                            @if (\Route::has(config('tenant.routes.tenants.list')))
                                @can(config('tenant.routes.tenants.list'))
                                    <a href="{{ route(config('tenant.routes.tenants.list')) }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Tenants') }}</span>
                                    </a>
                                @endcan
                            @endif
                            @if (\Route::has(config('acl.routes.roles.list')))
                                @can(config('acl.routes.roles.list'))
                                    <a href="{{ route(config('acl.routes.roles.list')) }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M20.71 16.71l-2.42-2.42a1 1 0 00-1.42 0l-3.58 3.58a1 1 0 00-.29.71V21a1 1 0 001 1h2.42a1 1 0 00.71-.29l3.58-3.58a1 1 0 000-1.42zM16 20h-1v-1l2.58-2.58 1 1zm-6 0H6a1 1 0 01-1-1V5a1 1 0 011-1h5v3a3 3 0 003 3h3v1a1 1 0 002 0V9v-.06a1.31 1.31 0 00-.06-.27v-.09a1.07 1.07 0 00-.19-.28l-6-6a1.07 1.07 0 00-.28-.19.32.32 0 00-.09 0L12.06 2H6a3 3 0 00-3 3v14a3 3 0 003 3h4a1 1 0 000-2zm3-14.59L15.59 8H14a1 1 0 01-1-1zM8 14h6a1 1 0 000-2H8a1 1 0 000 2zm0-4h1a1 1 0 000-2H8a1 1 0 000 2zm2 6H8a1 1 0 000 2h2a1 1 0 000-2z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Roles') }}</span>
                                    </a>
                                @endcan
                            @endif
                            @if (\Route::has(config('acl.routes.permissions.list')))
                                @can(config('acl.routes.permissions.list'))
                                    <a href="{{ route(config('acl.routes.permissions.list')) }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M10.21 14.75a1 1 0 001.42 0l4.08-4.08a1 1 0 00-1.42-1.42l-3.37 3.38-1.21-1.22a1 1 0 00-1.42 1.42zM21 2H3a1 1 0 00-1 1v18a1 1 0 001 1h18a1 1 0 001-1V3a1 1 0 00-1-1zm-1 18H4V4h16z" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Permissions') }}</span>
                                    </a>
                                @endcan
                            @endif
                            @if (\Route::has(config('acl.routes.users.list')))
                                @can(config('acl.routes.users.list'))
                                    <a href="{{ route(config('acl.routes.users.list')) }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg class="fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12.3 12.22A4.92 4.92 0 0014 8.5a5 5 0 00-10 0 4.92 4.92 0 001.7 3.72A8 8 0 001 19.5a1 1 0 002 0 6 6 0 0112 0 1 1 0 002 0 8 8 0 00-4.7-7.28zM9 11.5a3 3 0 113-3 3 3 0 01-3 3zm9.74.32A5 5 0 0015 3.5a1 1 0 000 2 3 3 0 013 3 3 3 0 01-1.5 2.59 1 1 0 00-.5.84 1 1 0 00.45.86l.39.26.13.07a7 7 0 014 6.38 1 1 0 002 0 9 9 0 00-4.23-7.68z" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Users') }}</span>
                                    </a>
                                @endcan
                            @endif

                            @if (\Route::has('tall.report.admin.reports'))
                                @can('tall.report.admin.reports')
                                    <a href="{{ route('tall.report.admin.reports') }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Relatorios') }}</span>
                                    </a>
                                @endcan
                            @endif

                            @if (\Route::has('admin.routes'))
                                @can('admin.routes')
                                    <a href="{{ route('admin.routes') }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Routes') }}</span>
                                    </a>
                                @endcan
                            @endif
                            @if (\Route::has('admin.livewire'))
                                @can('admin.livewire')
                                    <a href="{{ route('admin.livewire') }}"
                                        class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                        <span class="mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <span class="flex">{{ __('Components') }}</span>
                                    </a>
                                @endcan
                            @endif

                            @if ($route = config('menu.routes.menu.list'))
                                @if (\Route::has($route))
                                    @can($route)
                                        <a href="{{ route($route) }}"
                                            class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                            <span class="mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                                </svg>
                                            </span>
                                            <span class="flex">{{ __('Menus') }}</span>
                                        </a>
                                    @endcan
                                @endif
                            @endif
                            @if ($route = config('report.routes.reports.list'))
                                @if (\Route::has($route))
                                    @can($route)
                                        <a href="{{ route($route) }}"
                                            class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                            <span class="mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                            </span>
                                            <span class="flex">{{ __('Reports') }}</span>
                                        </a>
                                    @endcan
                                @endif
                            @endif
                            <a href="{{ route('profile.show') }}"
                                class="my-2 py-2 px-2 flex items-center rounded hover:bg-gray-800 hover:shadow hover:text-gray-200 transition-colors ease-in-out duration-500">
                                <span class="mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="flex">{{ __('Profile') }}</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
