<div class="table-responsive">
    <table class="table" id="clientNonSalaries-table">
        <thead>
            <tr>
                <th>Id Clients</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Carte Identite</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientNonSalaries as $clientNonSalarie)
            <tr>
                <td>{{ $clientNonSalarie->id_clients }}</td>
            <td>{{ $clientNonSalarie->nom }}</td>
            <td>{{ $clientNonSalarie->prenom }}</td>
            <td>{{ $clientNonSalarie->carte_identite }}</td>
                <td>
                    {!! Form::open(['route' => ['clientNonSalaries.destroy', $clientNonSalarie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientNonSalaries.show', [$clientNonSalarie->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientNonSalaries.edit', [$clientNonSalarie->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
