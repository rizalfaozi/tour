<table class="table table-responsive" id="commissions-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Price</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($commissions as $commissions)
        <tr>
            <td>{!! $commissions->user_id !!}</td>
            <td>{!! $commissions->price !!}</td>
            <td>{!! $commissions->status !!}</td>
            <td>
                {!! Form::open(['route' => ['commissions.destroy', $commissions->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('commissions.show', [$commissions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('commissions.edit', [$commissions->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>