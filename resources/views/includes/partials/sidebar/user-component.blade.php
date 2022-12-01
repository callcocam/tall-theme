<div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
    <button x-on:click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
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
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <p class="text-xs text-slate-400 dark:text-navy-300"
                            x-tooltip.placement.right="'{{ Auth::user()->currentTeam->name }}'">
                            {{ Str::limit(Auth::user()->currentTeam->name, 20, '...') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="flex flex-col pt-2 pb-5">
                <x-tall-acl.teams.user-link href="{{ route('admin.profile.show') }}">
                    <x-slot name="icon">
                        <x-tall-icon name="user" class="h-4.5 w-4.5" />
                    </x-slot>
                    {{ __('Profile') }}
                    <x-slot name="description">
                        <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                            {{ __('Your profile setting') }}
                        </div>
                    </x-slot>
                </x-tall-acl.teams.user-link>
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <!-- Team Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>
                    <x-tall-acl.teams.user-link href="{{ route('admin.teams.show', Auth::user()->currentTeam->id) }}">
                        <x-slot name="icon">
                            <x-tall-icon name="cog" class="h-4.5 w-4.5" />
                        </x-slot>
                        {{ __('Team Settings') }}
                        <x-slot name="description">
                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                {{ __('Manage Team') }}
                            </div>
                        </x-slot>
                    </x-tall-acl.teams.user-link>
                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-tall-acl.teams.user-link href="{{ route('admin.teams.create') }}">
                            <x-slot name="icon">
                                <x-tall-icon name="plus" class="h-4.5 w-4.5" />
                            </x-slot>
                            {{ __('Create New Team') }}
                            <x-slot name="description">
                                <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                    {{ __('Manage Team') }}
                                </div>
                            </x-slot>
                        </x-tall-acl.teams.user-link>
                    @endcan
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>
                        @foreach (Auth::user()->allTeams() as $team)
                            <x-tall-acl.teams.switchable-team :team="$team" />
                        @endforeach
                    @endif
                @endif
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
