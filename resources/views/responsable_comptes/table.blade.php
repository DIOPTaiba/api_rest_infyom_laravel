<div class="table-responsive">
    <table class="table" id="responsableComptes-table">
        <thead>
            <tr>
                <th>Login</th>
        <th>Mot De Passe</th>
        <th>Id Employes</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($responsableComptes as $responsableCompte)
            <tr>
                <td>{{ $responsableCompte->login }}</td>
            <td>{{ $responsableCompte->mot_de_passe }}</td>
            <td>{{ $responsableCompte->id_employes }}</td>
                <td>
                    {!! Form::open(['route' => ['responsableComptes.destroy', $responsableCompte->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('responsableComptes.show', [$responsableCompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('responsableComptes.edit', [$responsableCompte->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
