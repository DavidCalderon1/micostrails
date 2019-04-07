<table class="table table-responsive" id="purchases-table">
    <thead>
        <tr>
            <th>Providers Id</th>
        <th>Storage Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($purchases as $purchases)
        <tr>
            <td>{!! $purchases->providers_id !!}</td>
            <td>{!! $purchases->storage_id !!}</td>
            <td>
                {!! Form::open(['route' => ['purchases.destroy', $purchases->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('purchases.show', [$purchases->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('purchases.edit', [$purchases->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>