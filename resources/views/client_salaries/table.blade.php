<div class="table-responsive">
    <table class="table" id="clientSalaries-table">
        <thead>
            <tr>
                <th>Id Clients</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Carte Identite</th>
        <th>Profession</th>
        <th>Salaire</th>
        <th>Nom Employeur</th>
        <th>Adresse Entreprise</th>
        <th>Raison Social</th>
        <th>Identifiant Entreprise</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientSalaries as $clientSalarie)
            <tr>
                <td>{{ $clientSalarie->id_clients }}</td>
            <td>{{ $clientSalarie->nom }}</td>
            <td>{{ $clientSalarie->prenom }}</td>
            <td>{{ $clientSalarie->carte_identite }}</td>
            <td>{{ $clientSalarie->profession }}</td>
            <td>{{ $clientSalarie->salaire }}</td>
            <td>{{ $clientSalarie->nom_employeur }}</td>
            <td>{{ $clientSalarie->adresse_entreprise }}</td>
            <td>{{ $clientSalarie->raison_social }}</td>
            <td>{{ $clientSalarie->identifiant_entreprise }}</td>
                <td>
                    {!! Form::open(['route' => ['clientSalaries.destroy', $clientSalarie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientSalaries.show', [$clientSalarie->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientSalaries.edit', [$clientSalarie->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
