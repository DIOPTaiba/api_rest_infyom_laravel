<div class="table-responsive">
    <table class="table" id="clientMorals-table">
        <thead>
            <tr>
                <th>Id Clients</th>
        <th>Nom Entreprise</th>
        <th>Identifiant Entreprise</th>
        <th>Raison Social</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientMorals as $clientMoral)
            <tr>
                <td>{{ $clientMoral->id_clients }}</td>
            <td>{{ $clientMoral->nom_entreprise }}</td>
            <td>{{ $clientMoral->identifiant_entreprise }}</td>
            <td>{{ $clientMoral->raison_social }}</td>
                <td>
                    {!! Form::open(['route' => ['clientMorals.destroy', $clientMoral->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientMorals.show', [$clientMoral->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientMorals.edit', [$clientMoral->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
