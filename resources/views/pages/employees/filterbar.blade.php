<form action="#" method="GET">

    <div class='row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-3 rounded'>

        <div class='col-5'>
            <div class="input-group">
                <label for="employees" class="input-group-text bg-white">Funcionários</label>
                <input type="search" class='form-control' name='employees' id='employees' placeholder="Faça um busca pelo funcionário...">
            </div>
        </div>

        <div class='col-5'>
            <div class="input-group">
                <label for="period" class="input-group-text bg-white">Período</label>
                <input type='date' class='form-control' name='date_begin' value='{{date('Y-m-d')}}'>
                <input type='date' class='form-control' name='date_final' value='{{date('Y-m-d')}}'>
            </div>
        </div>

        <div class='col-2'>
            <div class="input-group w-100 h-100">
                <button class='btn btn-info w-100 h-100' type='submit'>Filtrar</button>
            </div>
        </div>

    </div>

</form>


