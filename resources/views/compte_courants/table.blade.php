<div class="table-responsive">
    <table class="table" id="compteCourants-table">
        <thead>
            <tr>
                <th>Id Comptes</th>
        <th>Agios</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteCourants as $compteCourant)
            <tr>
                <td>{{ $compteCourant->id_comptes }}</td>
            <td>{{ $compteCourant->agios }}</td>
                <td>
                    {!! Form::open(['route' => ['compteCourants.destroy', $compteCourant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteCourants.show', [$compteCourant->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteCourants.edit', [$compteCourant->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
