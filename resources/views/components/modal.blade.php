  @props(['title'=>'Modal Title'])
  <div x-data="{ showModal: @entangle('showModal').defer }">
      <button x-on:click="$wire.showModal = true" class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
          <x-tall-icon name="eye" />
      </button>
      <div class="fixed inset-0 z-[100] flex flex-col items-center justify-center overflow-hidden px-4 py-6 sm:px-5"
          x-show="showModal" role="dialog" @keydown.window.escape="$wire.showModal = false">
          <div class="absolute inset-0 bg-slate-900/60 transition-opacity duration-300" x-on:click="$wire.showModal = false"
              x-show="showModal" x-transition:enter="ease-out" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="ease-in" x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"></div>
          <div class="relative w-full max-w-2xl origin-bottom rounded-lg bg-white pb-4 transition-all duration-300 dark:bg-navy-700"
              x-show="showModal" x-transition:enter="easy-out" x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100" x-transition:leave="easy-in"
              x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
              <div class="flex justify-between rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 sm:px-5">
                  <h3 class="text-base font-medium text-slate-700 dark:text-navy-100">
                      {{ $title }}
                  </h3>
                  <button x-on:click="$wire.showModal = false"
                      class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                  </button>
              </div>
              <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                  {{ $slot }}
              </div>
              <div class="text-center">
                  @isset($actions)
                      {{ $actions }}
                  @endisset
              </div>
          </div>
      </div>
  </div>
