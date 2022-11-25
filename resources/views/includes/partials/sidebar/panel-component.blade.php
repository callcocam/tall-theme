<div class="sidebar-panel">
    @if ($subMenus)
        <div class="flex h-full grow flex-col bg-white pl-[var(--main-sidebar-width)] dark:bg-navy-750">
            <!-- Sidebar Panel Header -->
            <div class="flex h-18 w-full items-center justify-between pl-4 pr-1">
                <p class="text-base tracking-wider text-slate-800 dark:text-navy-100">
                    {{ data_get($current, 'name') }}
                </p>
                <button x-on:click="$store.global.isSidebarExpanded = false"
                    class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewbox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>
            <!-- Sidebar Panel Body -->
            <div class="h-[calc(100%-4.5rem)] overflow-x-hidden pb-6" x-data="{ expandedItem: null }" x-init="$el._x_simplebar = new SimpleBar($el);">
                <ul class="flex flex-1 flex-col px-4 font-inter">
                    @foreach ($subMenus as $keyMenu => $menu)
                        @if (data_get($menu, 'menu_sub_id'))
                            @if ($sub_menus = array_filter($menu->sub_menus->toArray()))
                                <li x-data="accordionItem('{{ $keyMenu }}')">
                                    <a :class="expanded ? 'text-slate-800 font-semibold dark:text-navy-50' :
                                        'text-slate-500 dark:text-navy-200'"
                                        x-on:click="expanded = !expanded"
                                        class="flex items-center justify-between py-2 text-xs+ tracking-wide  outline-none transition-[color,padding-left] duration-300 ease-in-out hover:text-slate-800  dark:hover:text-navy-50"
                                        href="javascript:void(0);">
                                        <span>{{ data_get($menu, 'name') }}</span>
                                        <svg :class="expanded && 'rotate-90'" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 text-slate-400 transition-transform ease-in-out"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <ul x-collapse x-show="expanded">
                                        @foreach ($sub_menus as $keyMenu => $sub_menu)
                                            @if (Route::has(data_get($sub_menu, 'link')))
                                                @can(data_get($sub_menu, 'link'))
                                                    <li
                                                        @if (request()->routeIs(sprintf('%s.*', $routePrefix))) x-init="$el.scrollIntoView({block:'center'}); expanded = true" @endif>
                                                        <a href="{{ route(data_get($sub_menu, 'link')) }}"
                                                            class="flex items-center justify-between p-2 text-xs+ tracking-wide
                                    outline-none transition-[color,padding-left] duration-300 ease-in-out hover:pl-4
                                    {{ request()->routeIs($pageName) ? 'text-primary dark:text-accent-light font-medium' : 'text-slate-500 hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50' }}">
                                                            <div class="flex items-center space-x-2">
                                                                <div
                                                                    class="h-1.5 w-1.5 rounded-full border border-current opacity-40">
                                                                </div>
                                                                <span>{{ data_get($sub_menu, 'name') }}</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endcan
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                @if (Route::has(data_get($menu, 'link')))
                                    @can(data_get($menu, 'link'))
                                        <li
                                            @if (request()->routeIs(sprintf('%s.*', $routePrefix))) x-init="$el.scrollIntoView({block:'center'});" @endif>
                                            <a href="{{ route(data_get($menu, 'link')) }}"
                                                class="flex text-xs+ py-2  tracking-wide outline-none transition-colors duration-300 ease-in-out {{ request()->routeIs(data_get($menu, 'link')) ? 'text-primary dark:text-accent-light font-medium' : 'text-slate-500  hover:text-slate-800 dark:text-navy-200 dark:hover:text-navy-50' }}">
                                                {{ data_get($menu, 'name') }}
                                            </a>
                                        </li>
                                    @endcan
                                @endif
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
