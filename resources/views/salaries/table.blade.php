<table class="table table-responsive" id="salaries-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Total</th>
        <th>Type</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($salaries as $salaries)
        <tr>
            <td>{!! $salaries->user_id !!}</td>
            <td>{!! $salaries->total !!}</td>
            <td>{!! $salaries->type !!}</td>
            <td>{!! $salaries->status !!}</td>
            <td>
                {!! Form::open(['route' => ['salaries.destroy', $salaries->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('salaries.show', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('salaries.edit', [$salaries->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>