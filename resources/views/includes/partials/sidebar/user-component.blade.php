<div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
    <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
        <img class="rounded-full" src="{{ $user->profile_photo_url }}" alt="avatar" />
        <span
            class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
    </button>
    <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
        <div
            class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
            <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                <div class="avatar h-14 w-14">
                    <img class="rounded-full" src="{{ $user->profile_photo_url }}" alt="avatar" />
                </div>
                <div>
                    <a href="#"
                        class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                        {{ $user->name }}
                    </a>
                    <p class="text-xs text-slate-400 dark:text-navy-300">
                        {{ $user->email }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col pt-2 pb-5">
                <a href="{{ route('admin.profile.show') }}"
                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                        <x-tall-icon name="user" class="h-4.5 w-4.5" />
                    </div>

                    <div>
                        <h2
                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            {{ __('Profile') }}
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            {{ __('Your profile setting') }}
                        </div>
                    </div>
                </a>
                @can('admin.roles')
                    <a href="{{ route('admin.roles') }}"
                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white">
                            <x-tall-icon name="lock-closed" class="h-4.5 w-4.5" />
                        </div>

                        <div>
                            <h2
                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                {{ __('Roles') }}
                            </h2>
                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                {{ __('Your roles') }}
                            </div>
                        </div>
                    </a>
                @endcan
                @can('admin.permissions')
                    <a href="{{ route('admin.permissions') }}"
                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white">
                            <x-tall-icon name="shield-exclamation" class="h-4.5 w-4.5" />
                        </div>

                        <div>
                            <h2
                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                {{ __('Permissions') }}
                            </h2>
                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                {{ __('Your permisions') }}
                            </div>
                        </div>
                    </a>
                @endcan

                @can('admin.users')
                    <a href="{{ route('admin.users') }}"
                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white">
                            <x-tall-icon name="users" class="h-4.5 w-4.5" />
                        </div>

                        <div>
                            <h2
                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                {{ __('Users') }}
                            </h2>
                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                {{ __('Your users') }}
                            </div>
                        </div>
                    </a>
                @endcan
                <a href="#"
                    class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewbox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>

                    <div>
                        <h2
                            class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                            Settings
                        </h2>
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            Webapp settings
                        </div>
                    </div>
                </a>
                <div class="mt-3 px-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
