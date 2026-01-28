<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm">
    <div class="flex items-center justify-between gap-4">
        <div>
            <h2 class="text-lg font-extrabold text-gray-800">Gerenciamento de usuários</h2>
            <p class="mt-1 text-sm text-gray-500">Acesse a tabela para criar, editar, excluir e filtrar usuários.</p>
        </div>

        <a
            href="{{ route('users') }}"
            class="inline-flex items-center justify-center gap-2
                   rounded-full bg-blue-600
                   px-10 py-3 text-sm font-bold text-white
                   shadow-sm transition hover:bg-blue-700"
        >
            <span class="text-base"> 👥</span>
            <span>Acessar</span>
        </a>
    </div>
</div>

</x-app-layout>
