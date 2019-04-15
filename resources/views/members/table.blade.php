<table  id="example" class="table  table-striped table-bordered" style="width:100%">
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
        <th >Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            
            <td><img src="@if(isset($member) ? $member->photo != '' : false){!! $member->photo !!}@else {{ asset('files/photo/default.png') }}  @endif" width="50"
                height="50"></td>
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

<style type="text/css">
    #example_paginate .pagination{
         margin: 0px 0;
         position: relative;
         top:-6px;
        float: right;
    }   
</style>