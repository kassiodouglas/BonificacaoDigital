<x-app-layout>

    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        @include('Pages.employees.filterbar')

        @include('Pages.employees.table')

        @include('Pages.employees.pagination')

    </x-slot>

</x-app-layout>



