<table class="table table-responsive" id="members-table">
    <thead>
        <tr>
           
        <th>Photo</th>
        <th> Nama Lengkap</th>
        <th>Umur</th>
        <th>Phone</th>
        <th>No KTP</th>
        <th>No Passpor</th>
        <th>No Visa</th>
        <th>Status</th>
      
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <!-- <td>{!! $member->user_id !!}</td> -->
            <td><img src="{!! asset( $member->photo) !!}") width="100"></td>
            <td>{!! $member->first_name !!} {!! $member->last_name !!}</td>
            <td>{!! $member->age !!} Tahun</td>
            <td>{!! $member->phone !!}</td>
           
          
            <td>{!! $member->id_card !!}</td>
            <td>{!! $member->passport_number !!}</td>
          
            
            <td>{!! $member->visa_number !!}</td>
           
            <td> @if($member->status>0)
               Aktif
             @else
                Non Aktif
             @endif</td>
          
            <td>
                {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('members.show', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('members.edit', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>