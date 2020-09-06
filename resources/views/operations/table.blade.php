<div class="table-responsive">
    <table class="table" id="operations-table">
        <thead>
            <tr>
                <th>Type Operation</th>
        <th>Montant</th>
        <th>Date Operation</th>
        <th>Id Compte Source Id</th>
        <th>Id Compte Destinataire Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($operations as $operations)
            <tr>
                <td>{{ $operations->type_operation }}</td>
            <td>{{ $operations->montant }}</td>
            <td>{{ $operations->date_operation }}</td>
            <td>{{ $operations->id_compte_source_id }}</td>
            <td>{{ $operations->id_compte_destinataire_id }}</td>
                <td>
                    {!! Form::open(['route' => ['operations.destroy', $operations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('operations.show', [$operations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('operations.edit', [$operations->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
