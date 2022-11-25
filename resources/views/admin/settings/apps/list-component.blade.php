<main class="main-content w-full px-[var(--margin-x)] pb-8">
    <div class="mt-12 text-center">
        <div class="avatar h-16 w-16">
            <div class="is-initial rounded-full bg-gradient-to-br from-pink-500 to-rose-500 text-white">
                <i class="fa-solid fa-shapes text-2xl"></i>
            </div>
        </div>
        <h3 class="mt-3 text-xl font-semibold text-slate-600 dark:text-navy-100">
            {{ __('Applications') }}
        </h3>
        <p class="mt-0.5 text-base">
            {{ __('List of prebuilt applications of :name', ['name' => config('app.name')]) }}
        </p>
    </div>

    <div class="mx-auto mt-8 grid w-full max-w-4xl grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:gap-6">
        @if (Route::has('admin.users'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-info text-white">
                        <x-tall-icon name="users" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Users') }}
                </h2>
                <p class="mt-1">
                    Lista cadatros, edição exclusão de usuários do sistema, controle de permissões. os usuários, não são
                    compartilhados com os tenants.
                    Existe uma tabela de usuários para o <b>{{ __('LANDLORD') }}</b> e uma tabela para os
                    <b>{{ __('TENANTS') }}</b>.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.users') }}">
                        {{ __('View Users') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.roles'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-warning text-white">
                        <x-tall-icon name="lock-closed" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Roles') }}
                </h2>
                <p class="mt-1">
                    Lista cadastro, edição, exclusão de papéis para o sistema, as permições são compartilhada com os
                    tenants.
                    para criar uma permissão para um unico tenant você de especificar o tenant, ou criar a permissão
                    acessando o propio tenant.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.roles') }}">
                        {{ __('View Roles') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.permissions'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-secondary text-white">
                        <x-tall-icon name="shield-exclamation" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Permissions') }}
                </h2>
                <p class="mt-1">
                    Lista, cadastro, edição e exclusão de permissões para o sistema, as permissões são comparilhadas com
                    os
                    tenant, geralmente são baseadas
                    nos nomes das rotas, quando uma rota é criada, você deve cadastrar ela aqui para ser mapeada, ou
                    você
                    pode acesssar <x-tall-app-link href="">aqui</x-tall-app-link> para atualizar o registro das
                    rotas, todas as novas rotas serão adicionadoas.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.permissions') }}">
                        {{ __('View Permissions') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.menus'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                        <x-tall-icon name="rectangle-group" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Menus') }}
                </h2>
                <p class="mt-1">
                    Lista, cadastro, edição e exclusão de menus. os menus serão compartilhado pelo sistema, mas você
                    pode
                    informar que um ou mais menus não serão usados por um tenant especifico,
                    Menus criados diretamente no tenant, só será visivel pelo mesmo.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.menus') }}">
                        {{ __('View Menus') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.menus.sub-menus'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-error text-white">
                        <x-tall-icon name="rectangle-group" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Sub Menus') }}
                </h2>
                <p class="mt-1">
                    Lista, cadastro, edição e exclusão de sub menus, os sub menus são relacionados a um ou mais menus e
                    são
                    compartilhados com os tenants, podem ser cridos baseados em uma rota, ou links externos.
                    também são usados para criar ancoras e rotas para os apps criados via <b>
                        <x-tall-app-link href="{{ route('admin.menus.sub-menus') }}">
                            {{ __('MAKE APP') }}
                        </x-tall-app-link>
                    </b>.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.menus.sub-menus') }}">
                        {{ __('View Sub Menus') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.makes'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-success text-white">
                        <i class="fa-solid fa-n text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Make') }}
                </h2>
                <p class="mt-1">
                    Lista, cadastro, edição e exclusão de APPS para o sistema. Uma app geralmente é um <b>CRUD</b>
                    estilo
                    <b>CMS</b>. você pode também adiconar uma ou mais paginas, para visualisar uma lista ou um registro
                    criado pelo <b>APP</b>.
                    Um <b>APP</b> pode ser compartilhado com varios tenants. também é possivel especificar visualição em
                    tabela ou blocos.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.makes') }}">
                        {{ __('View Makes') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.tenants'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-warning text-white">
                        <x-tall-icon name="rectangle-group" class="h-6 w-6" />
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Tenants') }}
                </h2>
                <p class="mt-1">
                    Lista, cadastro, edição e exclusão tenants, Os tenants são os <b>APPS</b> que controlam os dados do
                    sistema, o filtro é pelo dominio acessado. ex: <b>www.tenant.com</b>, e um tenant
                    <b>www.landlord.com</b> é outro tenant.
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.tenants') }}">
                        {{ __('View Tenants') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
        @if (Route::has('admin.tenants.setting'))
            <div class="card p-4 sm:p-5">
                <div class="avatar h-12 w-12">
                    <div class="is-initial rounded-full bg-primary text-white dark:bg-accent">
                        <i class="fa-solid fa-car-rear text-xl"></i>
                    </div>
                </div>
                <h2 class="mt-5 text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ config('app.name') }}
                </h2>
                <p class="mt-1">
                    {!! config('app.tenant.description') !!}
                </p>
                <div class="mt-5 pb-1">
                    <x-tall-app-link href="{{ route('admin.tenants.setting') }}">
                        {{ __('View Tenant') }}
                    </x-tall-app-link>
                </div>
            </div>
        @endif
    </div>
</main>
