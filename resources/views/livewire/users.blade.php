<div class="mx-auto max-w-6xl px-4 py-8 font-sans text-gray-800">

    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-extrabold tracking-tight">Usuários</h1>
            <p class="text-sm text-gray-500">Gerencie cadastro, status e acessos</p>
        </div>

        <div class="flex items-center gap-2">           
            <button
                wire:click="toggleForm"
                @class([
                    'inline-flex items-center gap-2 rounded-full px-4 py-2 text-sm font-bold shadow-sm transition',                    
                    'bg-blue-600 text-white hover:bg-blue-700',
                ])
            >
                <span class="text-base">{{ $showForm ? '✕' : '+' }}</span>
                <span>{{ $showForm ? 'Fechar' : 'Novo usuário' }}</span>
            </button>
        </div>
    </div>

    {{-- Form Card --}}
    @if ($showForm)
        <div class="mb-8 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-extrabold">
                        {{ $isEdit ? 'Editar usuário' : 'Cadastrar usuário' }}
                    </h2>
                    <p class="text-xs text-gray-500">
                        Preencha os dados e defina o status
                    </p>
                </div>

                <span
                    @class([
                        'rounded-full px-3 py-1 text-xs font-bold',
                        'bg-blue-100 text-blue-700',
                        'bg-amber-100 text-amber-700' => $isEdit,
                    ])
                >
                    {{ $isEdit ? 'Edição' : 'Novo' }}
                </span>
            </div>

            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" autocomplete="off">
                {{-- Honeypot/Antispam inputs --}}
                <input type="text" style="display:none">
                <input type="password" style="display:none">

                <div class="grid grid-cols-1 gap-4 md:grid-cols-12">

                    {{-- Nome --}}
                    <div class="md:col-span-4">
                        <label class="mb-1 block text-[11px] font-extrabold uppercase tracking-wide text-gray-500">
                            Nome
                        </label>

                        <input
                            wire:model.defer="name"
                            type="text"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:bg-white"
                        >

                        @error('name')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- E-mail --}}
                    <div class="md:col-span-4">
                        <label class="mb-1 block text-[11px] font-extrabold uppercase tracking-wide text-gray-500">
                            E-mail
                        </label>

                        <input
                            wire:model.defer="email"
                            type="email"
                            autocomplete="off"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:bg-white"
                        >

                        @error('email')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Senha --}}
                    <div class="md:col-span-4">
                        <label class="mb-1 block text-[11px] font-extrabold uppercase tracking-wide text-gray-500">
                            Senha
                            <span class="font-semibold normal-case text-gray-400">
                                ({{ $isEdit ? 'deixe vazio para manter' : 'obrigatória' }})
                            </span>
                        </label>

                        <input
                            wire:model.defer="password"
                            type="password"
                            autocomplete="new-password"
                            class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:bg-white"
                        >

                        @error('password')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Status (toggle ativo <-> inativo) --}}
                    <div class="md:col-span-12">
                        <label class="mb-2 block text-[11px] font-extrabold uppercase tracking-wide text-gray-500">
                            Status
                        </label>

                        <div class="inline-flex items-center rounded-full bg-white p-1 shadow-sm ring-1 ring-gray-200">
                            <button
                                type="button"
                                wire:click="toggleStatus"
                                @class([
                                    'rounded-full px-5 py-2 text-xs font-extrabold uppercase tracking-wide transition',
                                    'bg-green-600 text-white shadow-sm' => $status === 'ativo',
                                    'bg-gray-50 text-gray-600 hover:bg-gray-100' => $status !== 'ativo',
                                ])
                            >
                                Ativo
                            </button>

                            <span class="mx-2 h-5 w-px bg-gray-300"></span>

                            <button
                                type="button"
                                wire:click="toggleStatus"
                                @class([
                                    'rounded-full px-5 py-2 text-xs font-extrabold uppercase tracking-wide transition',
                                    'bg-red-600 text-white shadow-sm' => $status === 'inativo',
                                    'bg-gray-50 text-gray-600 hover:bg-gray-100' => $status !== 'inativo',
                                ])
                            >
                                Inativo
                            </button>
                        </div>

                        @error('status')
                            <span class="mt-1 block text-xs text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="mt-6 flex flex-col-reverse gap-2 border-t pt-4 sm:flex-row sm:justify-end">
                    <button
                        type="button"
                        wire:click="toggleForm"
                        class="rounded-full px-5 py-2.5 text-sm font-extrabold text-gray-600 transition hover:bg-gray-100"
                    >
                        Cancelar
                    </button>

                    <button
                        type="submit"
                        @class([
                            'rounded-full px-6 py-2.5 text-sm font-extrabold shadow-sm transition text-white',
                            'bg-blue-600 hover:bg-blue-700',
                            'bg-amber-500 hover:bg-amber-600' => $isEdit,
                        ])
                    >
                        {{ $isEdit ? 'Atualizar' : 'Salvar' }}
                    </button>
                </div>
            </form>
        </div>
    @endif

    {{-- Table Card --}}
    <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm">

        {{-- Header + Filtros --}}
        <div class="flex flex-col gap-3 border-b px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
            <h3 class="text-sm font-extrabold uppercase tracking-wide text-gray-700">
                Lista de usuários
            </h3>

            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:gap-3">
                {{-- Filtros --}}
                <div class="inline-flex items-center rounded-full bg-gray-100 p-1">                    
                    <button
                        type="button"
                        wire:click="$set('filterStatus','todos')"
                        @class([
                            'rounded-full px-4 py-1.5 text-xs font-extrabold uppercase transition',
                            'bg-blue-600 text-white shadow-sm' => $filterStatus === 'todos',
                            'text-gray-600 hover:text-gray-800' => $filterStatus !== 'todos',
                        ])
                    >
                        Todos
                    </button>

                    <button
                        type="button"
                        wire:click="$set('filterStatus','ativo')"
                        @class([
                            'rounded-full px-4 py-1.5 text-xs font-extrabold uppercase transition',
                            'bg-green-600 text-white shadow-sm' => $filterStatus === 'ativo',
                            'text-gray-600 hover:text-gray-800' => $filterStatus !== 'ativo',
                        ])
                    >
                        Ativos
                    </button>

                    <button
                        type="button"
                        wire:click="$set('filterStatus','inativo')"
                        @class([
                            'rounded-full px-4 py-1.5 text-xs font-extrabold uppercase transition',
                            'bg-red-600 text-white shadow-sm' => $filterStatus === 'inativo',
                            'text-gray-600 hover:text-gray-800' => $filterStatus !== 'inativo',
                        ])
                    >
                        Inativos
                    </button>
                </div>

                {{-- Total --}}
                <span class="text-xs text-gray-500">
                    Total: <span class="font-bold text-gray-700">{{ $users->count() }}</span>
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="border-b bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-[11px] font-extrabold uppercase tracking-wide text-gray-500">Nome</th>
                        <th class="px-6 py-3 text-[11px] font-extrabold uppercase tracking-wide text-gray-500">E-mail</th>
                        <th class="px-6 py-3 text-[11px] font-extrabold uppercase tracking-wide text-gray-500">Senha</th>
                        <th class="px-6 py-3 text-center text-[11px] font-extrabold uppercase tracking-wide text-gray-500">Status</th>
                        <th class="px-6 py-3 text-right text-[11px] font-extrabold uppercase tracking-wide text-gray-500">Ações</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr class="transition hover:bg-gray-50" wire:key="user-{{ $user->id }}">
                            <td class="px-6 py-4">
                                <div class="text-sm font-bold text-gray-800">{{ $user->name }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-700">{{ $user->email }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="select-none text-sm tracking-widest text-gray-400">••••••••</span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <span
                                    @class([
                                        'inline-flex items-center justify-center rounded-full px-4 py-1.5 text-xs font-extrabold uppercase tracking-wide text-white',
                                        'bg-green-600' => $user->status === 'ativo',
                                        'bg-red-600' => $user->status === 'inativo',
                                    ])
                                >
                                    {{ $user->status }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-2">
                                    <button
                                        type="button"
                                        wire:click.prevent="edit({{ $user->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="edit"
                                        class="relative z-10 inline-flex min-w-[88px] items-center justify-center rounded-full bg-blue-600 px-4 py-2 text-xs font-extrabold uppercase text-white shadow-sm transition hover:bg-blue-700 disabled:opacity-60"
                                    >
                                        Editar
                                    </button>

                                    <button
                                        type="button"
                                        wire:click.prevent="delete({{ $user->id }})"
                                        wire:confirm="Excluir este usuário?"
                                        wire:loading.attr="disabled"
                                        wire:target="delete"
                                        class="relative z-10 inline-flex min-w-[88px] items-center justify-center rounded-full bg-red-600 px-4 py-2 text-xs font-extrabold uppercase text-white shadow-sm transition hover:bg-red-700 disabled:opacity-60"
                                    >
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">
                                Nenhum usuário cadastrado ainda.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
