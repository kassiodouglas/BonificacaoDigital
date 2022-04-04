
<div class='row max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white shadow mt-3 rounded'>

    @if( $users->total() == 0)
        <div class="alert alert-warning text-center"> Não há funcionários <i class="fas fa-sad-cry"></i> </div>
    @else

        <div class='fw-bold my-2'>Exibindo {{$users->firstItem()}} a {{$users->lastItem()}} de um total de {{$users->total()}} funcionários</div>

        <table class='table table-hover align-middle text-center'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Funcionário</th>
                    <th>Saldo</th>
                    <th>Data de cadastro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class='text-center'>
                @foreach ($users as $user)
                    @php
                        $saldo = 0;
                        foreach ($user->movimentacoes as $mov):
                            if($mov->id_type == 1) $saldo -= $mov->value;
                            if($mov->id_type == 2) $saldo += $mov->value;
                        endforeach;

                        $color = ($saldo >= 0) ? 'success' : 'danger';
                    @endphp

                    @include('components.modals.update_employee', ['user'=>$user])
                    @include('components.modals.extract', ['user'=>$user])

                    <tr>
                        <td> #{{$user->id}} </td>
                        <td> <i class="fas fa-user-circle"></i> {{$user->name}}</td>
                        <td> <span class='fw-bold text-{{$color}}'> $ {{number_format($saldo,2)}} </span> </td>
                        <td> {{date('d/m/Y H:i', strtotime($user->created_at))}} </td>
                        <td>
                            <button class="btn btn-success mx-1" data-bs-toggle="modal" data-bs-target="#modal_extract{{$user->id}}" data-bs-tooltip="tooltip" data-bs-placement="top" title="Ver extrato"> <i class="far fa-calendar-alt"></i> </button>

                            @if(Auth::user()->is_admin)
                                <button class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#modal_update_employee{{$user->id}}" data-bs-tooltip="tooltip" data-bs-placement="top" title="Editar funcionário"> <i class="fas fa-user-edit"></i> </button>

                                @if(Auth::user()->id !== $user->id)
                                <button class="btn btn-danger mx-1" onclick="deleteEmployee(`{{$user->name}}`, '{{route('destroy.user', ['id'=>$user->id])}}')" data-bs-tooltip="tooltip" data-bs-placement="top" title="Deletar funcionário"> <i class="fas fa-user-times"></i> </button>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif

</div>
