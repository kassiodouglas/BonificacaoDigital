<div class="modal fade" id="modal_new_movement" tabindex="-1" aria-labelledby="modal_new_movement" aria-hidden="true">

    <form action="{{route('insert.movement')}}" method="PUT" onsubmit="insertMovement(event)">

        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Nova movimentação</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @include('Components.forms.movement')

            </div>
            <div class="modal-footer">
                <button type="reset" class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" data-bs-dismiss="modal">
                    Cancelar <i class="mx-2 fas fa-ban"></i>
                </button>
                <button type="submit" class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Salvar <i class="mx-2 fas fa-save"></i>
                </button>
            </div>
        </div>
        </div>

    </form>

</div>
