
<div class='row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow my-3 rounded'>

    @if( $movements->total() == 0 )
        <div class="alert alert-warning text-center"> Não há movimentações <i class="fas fa-sad-cry"></i> </div>
    @else

        <div class='fw-bold my-2'>Exibindo {{$movements->firstItem()}} a {{$movements->lastItem()}} de um total de {{$movements->total()}} movimentações</div>

        <table class='table table-hover align-middle text-center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>type Movimentação</th>
                    <th>Data</th>
                    <th>Funcionário</th>
                    <th>Valor</th>
                    <th>Observação</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody class='text-center'>
                @foreach ($movements as $movement)

                    @php
                        $icon = ($movement->type_movement->type == 'Saida') ? '<i class="fas fa-arrow-alt-circle-down text-danger"></i>' : '<i class="fas fa-arrow-alt-circle-up text-success"></i>';
                        $color = ($movement->type_movement->type == 'Saida') ? 'danger' : 'success';
                    @endphp

                    <tr>
                        <td> #{{$movement->id}} </td>
                        <td> {!!$icon!!} {{$movement->type_movement->type}}  </td>
                        <td> {{date('d/m/Y H:i', strtotime($movement->created_at))}} </td>
                        <td>

                            <i class="fas fa-user-circle"></i>
                            {{$movement->user->name}}

                        </td>
                        <td> <span class='fw-bold text-{{$color}}'> $ {{number_format($movement->value,2)}} </span> </td>
                        <td> {{$movement->observation}}</td>
                        {{-- <td>
                            <button class="btn bg-roxo"> <i class="fas fa-eye text-white"></i> </button>
                        </td> --}}
                    </tr>

                @endforeach

            </tbody>
        </table>

    @endif

</div>
