<table class="table table-responsive" id="providers-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($providers as $providers)
        <tr>
            <td>{!! $providers->name !!}</td>
            <td>{!! $providers->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['providers.destroy', $providers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('providers.show', [$providers->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('providers.edit', [$providers->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>