<div class="modal fade" id="modal_extract{{$user->id}}" tabindex="-1" aria-labelledby="modal_extract{{$user->id}}"" aria-hidden="true">


    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Movimentações de {{$user->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">




            @php
                $movements = \App\Models\Movement::where('id_user', $user->id)->orderBy('created_at', 'DESC')->get();
                $saldo = 0;
                $entradas = 0;
                $saidas = 0;
                foreach ($user->movimentacoes as $mov):
                    if($mov->id_type == 1) {$saldo -= $mov->value; $entradas++;};
                    if($mov->id_type == 2) {$saldo += $mov->value; $saidas++;}
                endforeach;
                $color = ($saldo >= 0) ? 'success' : 'danger';
            @endphp

            @if( count( $movements) == 0)
             <div class="alert alert-warning text-center"> Não há movimentações <i class="fas fa-sad-cry"></i> </div>
            @else

                <div class='mb-3 fw-bold d-flex justify-content-center'>
                    Total de {{count($movements)}} movimentações, sendo {{$entradas}} entradas e {{$saidas}} saidas, tendo um saldo atualizado de <span class='fw-bold text-{{$color}}'>  $ {{number_format($saldo,2)}} </span>
                </div>

                <ul class="list-group small">
                    <li class="list-group-item">
                        <div class='row align-items-center fw-bold'>
                            <div class='col'> #ID </div>
                            <div class='col'> Tipo de movimentação</div>
                            <div class='col'> Data </div>
                            <div class='col'> Valor </div>
                            <div class='col'> Observação</div>
                        </div>
                    </li>
                    @foreach ( $movements as $movement)

                        @php
                            $icon = ($movement->type_movement->type == 'Saida') ? '<i class="fas fa-arrow-alt-circle-down text-danger"></i>' : '<i class="fas fa-arrow-alt-circle-up text-success"></i>';
                            $color = ($movement->type_movement->type == 'Saida') ? 'danger' : 'success';
                        @endphp

                            <li class="list-group-item">
                                <div class='row align-items-center'>
                                    <div class='col'> #{{$movement->id}} </div>
                                    <div class='col'>{!!$icon!!} {{$movement->type_movement->type}}  </div>
                                    <div class='col'>{{date('d/m/Y H:i', strtotime($movement->created_at))}} </div>
                                    <div class='col'><span class='fw-bold text-{{$color}}'> $ {{number_format($movement->value,2)}} </span> </div>
                                    <div class='col'>{{$movement->observation}} </div>
                                </div>
                            </li>


                    @endforeach
                </ul>

            @endif



        </div>
        <div class="modal-footer">
            <button type="reset" class="btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" data-bs-dismiss="modal">
                OK
            </button>
        </div>
    </div>
    </div>


</div>
