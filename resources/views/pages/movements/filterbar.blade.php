<form action="#" method="GET">

    <div class='row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-3 rounded'>

        <div class='col-12 col-md-3 my-1'>
            <div class="input-group">
                <label for="employees" class="input-group-text bg-white">Funcionários</label>
                <input type="search" class='form-control' name='employees' id='employees' placeholder="Faça um busca pelo funcionário...">
            </div>
        </div>

        <div class='col-12 col-md-3 my-1'>
            <div class="input-group w-100">
                <label for="type_movement" class="input-group-text bg-white">Tipo Mov.</label>
                <select class="w-50" id="type_movement" name="type_movement">
                    <option value="0">Todas</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saida</option>
                </select>
            </div>
        </div>

        <div class='col-12 col-md-4 my-1'>
            <div class="input-group">
                <label for="period" class="input-group-text bg-white">Período</label>
                <input type='date' class='form-control form-sm-control' name='date_begin' value='{{date('Y-m-d')}}'>
                <input type='date' class='form-control form-sm-control' name='date_final' value='{{date('Y-m-d')}}'>
            </div>
        </div>

        <div class='col-12 col-md-2 my-1'>
            <div class="input-group w-100 h-100">
                <button class='btn btn-info w-100 h-100' type='submit'>Filtrar</button>
            </div>
        </div>

    </div>

</form>


