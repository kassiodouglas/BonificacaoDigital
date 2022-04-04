<div class="row">

    @csrf

    <div class="col-12">
        <div class="mb-3">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" required
            value='@isset($user){{$user->name}}@endisset'>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" required
            value='@isset($user){{$user->email}}@endisset'>
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="login" class="block text-gray-700 text-sm font-bold mb-2">Login</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="login" name="login" required
            value='@isset($user){{$user->login}}@endisset'>
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="id_profile" class="block text-gray-700 text-sm font-bold mb-2">Perfil</label>
            <select name='id_profile' id='id_profile' class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
              <option>...</option>
              @foreach (\App\Models\Profile::all() as $profile)
                @php
                $id = isset($user) ? $user->id_profile : 0;
                @endphp
                <option value="{{ $profile->id }}" @if( $profile->id == $id ) selected @endif>{{ $profile->profile }}</option>
                @endforeach
            </select>
        </div>
    </div>
{{--
    <div class="col-12">
        <div class="mb-3">
            <label for="avatar" class="block text-gray-700 text-sm font-bold mb-2">Avatar</label>
            <input type="file" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="avatar" name="avatar">
        </div>
    </div> --}}

</div>
