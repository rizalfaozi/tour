<table class="table table-responsive" id="members-table">
    <thead>
        <tr>
            <!-- <th>User Id</th> -->
            <th>Photo</th>
        <th> Name</th>
        <th>Age</th>
        <th>Phone</th>
        <!-- <th>Alternative Phone</th> -->
        <!-- <th>Address</th> -->
        <!-- <th>Email</th> -->
        <th>Id Card</th>
        <th>Passport Number</th>
        <!-- <th>Bank Account Number</th> -->
        <!-- <th>Departure Date</th> -->
        <th>Visa Number</th>
        <th>Type</th>
        <!-- <th>Category Id</th> -->
        <th>Status</th>
        <!-- <th>Province Id</th> -->
        <!-- <th>Subdistrict Id</th> -->
        <!-- <th>Village Id</th> -->
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <!-- <td>{!! $member->user_id !!}</td> -->
            <td><img src="{!! asset( $member->photo) !!}") width="100"></td>
            <td>{!! $member->first_name !!} {!! $member->last_name !!}</td>
            <td>{!! $member->age !!}</td>
            <td>{!! $member->phone !!}</td>
            <td>{!! $member->alternative_phone !!}</td>
            <!-- <td>{!! $member->address !!}</td>
            <td>{!! $member->email !!}</td> -->
            <td>{!! $member->id_card !!}</td>
            <td>{!! $member->passport_number !!}</td>
            <!-- <td>{!! $member->bank_account_number !!}</td> -->
            <!-- <td>{!! $member->departure_date !!}</td> -->
            
            <td>{!! $member->visa_number !!}</td>
            <!-- <td>{!! $member->type !!}</td> -->
            <!-- <td>{!! $member->category_id !!}</td> -->
            <td>{!! $member->status !!}</td>
            <!-- <td>{!! $member->province_id !!}</td>
            <td>{!! $member->subdistrict_id !!}</td>
            <td>{!! $member->village_id !!}</td> -->
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