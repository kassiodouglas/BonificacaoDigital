<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movimentações') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        @include('Pages.movements.filterbar')

        @include('Pages.movements.table')

        @include('Pages.movements.pagination')

    </x-slot>


</x-app-layout>

