<div class="table-responsive">
    <table class="table" id="clients-table">
        <thead>
            <tr>
                <th>Id Responsable Compte</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Date Inscription</th>
        <th>Type Client</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $clients)
            <tr>
                <td>{{ $clients->id_responsable_compte }}</td>
            <td>{{ $clients->adresse }}</td>
            <td>{{ $clients->telephone }}</td>
            <td>{{ $clients->email }}</td>
            <td>{{ $clients->date_inscription }}</td>
            <td>{{ $clients->type_client }}</td>
                <td>
                    {!! Form::open(['route' => ['clients.destroy', $clients->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clients.show', [$clients->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clients.edit', [$clients->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
