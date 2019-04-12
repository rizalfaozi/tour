<table class="table table-responsive" id="agents-table">
    <thead>
        <tr>
        <th>Photo</th>
        <th>Name</th>
       
      
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Gender</th>
       
        <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($agents as $agents)
        <tr>
            <td><img width="50"  src="{!! $agents->photo !!}" /></td>
            <td>{!! $agents->name !!}</td>
            <td>{!! $agents->email !!}</td>
            <td>{!! $agents->phone !!}</td>
            <td>{!! $agents->address !!}</td>
            <td>{!! $agents->gender !!}</td>
            
            <td> @if($agents->status>0)
               Aktif
             @else
                Non Aktif
             @endif</td>
            <td>
                {!! Form::open(['route' => ['agents.destroy', $agents->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('agents.show', [$agents->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! url('agents/'.$agents->id.'/edit?type='.$type) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>