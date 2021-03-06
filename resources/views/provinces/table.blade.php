<table class="table table-responsive" id="provinces-table">
    <thead>
        <tr>
            <th>Nama Provinsi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($provinces as $provinces)
        <tr>
            <td>{!! $provinces->name !!}</td>
            <td>
                {!! Form::open(['route' => ['provinces.destroy', $provinces->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('provinces.show', [$provinces->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('provinces.edit', [$provinces->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>