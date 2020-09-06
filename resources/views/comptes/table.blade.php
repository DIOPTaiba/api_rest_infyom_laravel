<div class="table-responsive">
    <table class="table" id="comptes-table">
        <thead>
            <tr>
                <th>Id Clients</th>
        <th>Numero Compte</th>
        <th>Cle Rib</th>
        <th>Solde</th>
        <th>Date Ouverture</th>
        <th>Numero Agence</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comptes as $comptes)
            <tr>
                <td>{{ $comptes->id_clients }}</td>
            <td>{{ $comptes->numero_compte }}</td>
            <td>{{ $comptes->cle_rib }}</td>
            <td>{{ $comptes->solde }}</td>
            <td>{{ $comptes->date_ouverture }}</td>
            <td>{{ $comptes->numero_agence }}</td>
                <td>
                    {!! Form::open(['route' => ['comptes.destroy', $comptes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comptes.show', [$comptes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('comptes.edit', [$comptes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
