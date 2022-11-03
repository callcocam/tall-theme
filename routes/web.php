<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {

    Route::prefix('menus')->group(function () {
        Route::get('/', \Tall\Theme\Http\Livewire\Admin\Menus\ListComponent::class)->name('admin.menus');
        Route::get('/cadastrar', \Tall\Theme\Http\Livewire\Admin\Menus\CreateComponent::class)->name('admin.menu.create');
        Route::get('/{model}/editar', \Tall\Theme\Http\Livewire\Admin\Menus\EditComponent::class)->name('admin.menu.edit');
        Route::get('/{model}/visualizar', \Tall\Theme\Http\Livewire\Admin\Menus\ShowComponent::class)->name('admin.menu.show');
        Route::get('/{model}/excluir', \Tall\Theme\Http\Livewire\Admin\Menus\DeleteComponent::class)->name('admin.menu.delete');
        Route::prefix('sub-menus')->group(function () {

            Route::get('/', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ListComponent::class)->name('admin.menus.sub-menus');
            Route::get('/cadastrar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\CreateComponent::class)->name('admin.menus.sub-menu.create');
            Route::get('/{model}/editar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\EditComponent::class)->name('admin.menus.sub-menu.edit');
            Route::get('/{model}/visualizar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ShowComponent::class)->name('admin.menus.sub-menu.show');
            Route::get('/{model}/excluir', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\DeleteComponent::class)->name('admin.menus.sub-menu.delete');
        });
    });

    Route::prefix('makes')->group(function () {
        Route::get('/', \Tall\Theme\Http\Livewire\Admin\Make\ListComponent::class)->name('admin.makes');
        Route::get('/cadastrar', \Tall\Theme\Http\Livewire\Admin\Make\CreateComponent::class)->name('admin.make.create');
        Route::get('/{model}/editar', \Tall\Theme\Http\Livewire\Admin\Make\EditComponent::class)->name('admin.make.edit');
        Route::get('/{model}/visualizar', \Tall\Theme\Http\Livewire\Admin\Make\ShowComponent::class)->name('admin.make.show');
        Route::get('/{model}/excluir', \Tall\Theme\Http\Livewire\Admin\Make\DeleteComponent::class)->name('admin.make.delete');
    });
});
