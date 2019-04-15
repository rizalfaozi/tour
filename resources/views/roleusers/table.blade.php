<table class="table table-responsive" id="roleusers-table">
    <thead>
        <tr>
            <th>Role Id</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roleusers as $roleusers)
        <tr>
            <td>{!! $roleusers->role_id !!}</td>
            <td>{!! $roleusers->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['roleusers.destroy', $roleusers->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roleusers.show', [$roleusers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roleusers.edit', [$roleusers->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>