<div class="row">

    @csrf
    <input type='hidden' name='id_admin' value="{{Auth::id()}}">

    <div class="col-12">
        <div class="mb-3">
            <label for="id_user" class="block text-gray-700 text-sm font-bold mb-2">Funcionário</label>
            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" id="id_user" name="id_user">
                <option value="" selected>...</option>
                @foreach (\App\Models\User::orderBy('name')->get() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="id_type" class="block text-gray-700 text-sm font-bold mb-2">Tipo de movimentação</label>
            <select name='id_type' id='id_type' class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="" selected>...</option>
                @foreach (\App\Models\TypesMovement::all() as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="value" class="block text-gray-700 text-sm font-bold mb-2">Valor</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="value" name="value" required>
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">
            <label for="observation" class="">Observação</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="observation" name="observation"></textarea>
        </div>
    </div>

</div>
