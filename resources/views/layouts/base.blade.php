<x-tall-base-layout title="Starter Centered Links" is-sidebar-open="false" is-header-blur="true">
    <!-- Sidebar -->
    <div class="sidebar print:hidden">
        <!-- Main Sidebar Centered Links -->
        <div class="main-sidebar">
            <div
                class="flex h-full w-full flex-col items-center justify-between border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
                <!-- Application Logo -->
                <div class="flex pt-4">
                    <a href="/">
                        <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                            src="{{ asset('images/app-logo.svg') }}" alt="logo" />
                    </a>
                </div>
                <!-- Main Sections Links -->

                <!-- Main Sidebar -->
                @livewire(livewire('partials.sidebar.main'), key('sidebar.main'))
                <!-- Bottom Links -->
                
                @livewire(livewire('partials.sidebar.user'), key('sidebar.user'))
            </div>
        </div>

        <!-- Sidebar Panel -->
        @livewire(livewire('partials.sidebar.panel'), key('sidebar.panel'))
    </div>

    <!-- App Header -->
    @livewire(livewire('partials.header'), key('header'))


    <!-- Mobile Searchbar -->
    @livewire(livewire('partials.mobile.searchbar'), key('searchbar'))


    <!-- Right Sidebar -->
    {{-- <x-app-partials.right-sidebar></x-app-partials.right-sidebar> --}}
    @livewire(livewire('partials.sidebar.right'), key('right'))

    <!-- Main Content Wrapper -->
    {{ $slot }}
</x-tall-base-layout>
