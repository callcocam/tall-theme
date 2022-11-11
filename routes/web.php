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

    Route::get('/settings/apps', \Tall\Theme\Http\Livewire\Admin\Settings\Apps\ListComponent::class)->name('admin.settings.apps');
    Route::prefix('menus')->group(function () {
        Route::get('/', \Tall\Theme\Http\Livewire\Admin\Menus\ListComponent::class)->name('admin.menus');
        Route::get('/cadastrar', \Tall\Theme\Http\Livewire\Admin\Menus\CreateComponent::class)->name('admin.menus.create');
        Route::get('/{model}/editar', \Tall\Theme\Http\Livewire\Admin\Menus\EditComponent::class)->name('admin.menus.edit');
        Route::get('/{model}/visualizar', \Tall\Theme\Http\Livewire\Admin\Menus\ShowComponent::class)->name('admin.menus.show');
        Route::get('/{model}/excluir', \Tall\Theme\Http\Livewire\Admin\Menus\DeleteComponent::class)->name('admin.menus.delete');
        Route::prefix('sub-menus')->group(function () {

            Route::get('/', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ListComponent::class)->name('admin.menus.sub-menus');
            Route::get('/cadastrar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\CreateComponent::class)->name('admin.menus.sub-menus.create');
            Route::get('/{model}/editar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\EditComponent::class)->name('admin.menus.sub-menus.edit');
            Route::get('/{model}/visualizar', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\ShowComponent::class)->name('admin.menus.sub-menus.show');
            Route::get('/{model}/excluir', \Tall\Theme\Http\Livewire\Admin\Menus\Sub\DeleteComponent::class)->name('admin.menus.sub-menus.delete');
        });
    });

});
