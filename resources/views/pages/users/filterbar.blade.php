<form action="#" method="GET">

    <div class='row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-3 rounded'>

        <div class='col-5'>
            <div class="input-group">
                <label for="employees" class="input-group-text bg-white">Funcionário</label>
                <select class="w-50" id="funcionario" name="funcionario">
                    <option value="" selected>Todos</option>
                    @foreach ($allusers as $alluser)
                        @php $selected = ($alluser->id == $urlParams['funcionario']) ? "selected": "" @endphp
                        <option value="{{ $alluser->id }}" {{ $selected}}>{{ $alluser->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class='col-5'>
            <div class="input-group">
                <label for="periodo" class="input-group-text bg-white">Período</label>
                <input type='date' class='form-control form-sm-control' name='data_inicial' value='{{$urlParams['data_inicial']}}'>
                <input type='date' class='form-control form-sm-control' name='data_final' value='{{$urlParams['data_final']}}'>
            </div>
        </div>

        <div class='col-2'>
            <div class="input-group w-100 h-100">
                <button class='btn btn-info w-100 h-100' type='submit'>Filtrar</button>
            </div>
        </div>

    </div>

</form>


