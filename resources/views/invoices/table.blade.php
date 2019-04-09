<table class="table table-responsive" id="invoices-table">
    <thead>
        <tr>
            <th>Category Id</th>
        <th>Member Id</th>
        <th>Price</th>
        <th>Type</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoices)
        <tr>
            <td>{!! $invoices->category_id !!}</td>
            <td>{!! $invoices->member_id !!}</td>
            <td>{!! $invoices->price !!}</td>
            <td>{!! $invoices->type !!}</td>
            <td>{!! $invoices->status !!}</td>
            <td>
                {!! Form::open(['route' => ['invoices.destroy', $invoices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('invoices.show', [$invoices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('invoices.edit', [$invoices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>