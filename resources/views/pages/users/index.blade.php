<x-app-layout>

    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Funcionários') }}
        </h2>
    </x-slot>

    <x-slot name="slot">

        @include('Pages.users.filterbar')

        @include('Pages.users.table')

        @if( $users->hasPages())
            @include('Pages.users.pagination')
        @endif

    </x-slot>

</x-app-layout>



