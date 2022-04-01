<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('movements') }}" class='justify-center' style="width: 50px; align">
                <img src="{{asset('storage/img/BonificaçãoDigital.png')}}">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class='text-center mb-3'>
            Bata suas metas e ganhe moedas digitais. Troque-as por produtos e serviços com nossos parceiros.
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Login -->
            <div>
                <x-label for="login" :value="__('Login')" />

                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Manter conectado') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 mx-3" href="{{ route('register') }}">
                    {{ __('Não tem cadastro?') }}
                </a>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Acessar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
