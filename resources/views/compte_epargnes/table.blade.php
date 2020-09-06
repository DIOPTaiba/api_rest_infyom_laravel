<div class="table-responsive">
    <table class="table" id="compteEpargnes-table">
        <thead>
            <tr>
                <th>Id Comptes</th>
        <th>Frais Ouverture</th>
        <th>Montant Remuneration</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteEpargnes as $compteEpargne)
            <tr>
                <td>{{ $compteEpargne->id_comptes }}</td>
            <td>{{ $compteEpargne->frais_ouverture }}</td>
            <td>{{ $compteEpargne->montant_remuneration }}</td>
                <td>
                    {!! Form::open(['route' => ['compteEpargnes.destroy', $compteEpargne->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteEpargnes.show', [$compteEpargne->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteEpargnes.edit', [$compteEpargne->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
