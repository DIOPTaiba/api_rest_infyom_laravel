<div class="table-responsive">
    <table class="table" id="compteBloques-table">
        <thead>
            <tr>
                <th>Id Comptes</th>
        <th>Frais Ouverture</th>
        <th>Montant Remuneration</th>
        <th>Duree Blocage</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteBloques as $compteBloque)
            <tr>
                <td>{{ $compteBloque->id_comptes }}</td>
            <td>{{ $compteBloque->frais_ouverture }}</td>
            <td>{{ $compteBloque->montant_remuneration }}</td>
            <td>{{ $compteBloque->duree_blocage }}</td>
                <td>
                    {!! Form::open(['route' => ['compteBloques.destroy', $compteBloque->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteBloques.show', [$compteBloque->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteBloques.edit', [$compteBloque->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
