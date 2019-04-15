<table class="table table-responsive" id="histories-table">
    <thead>
        <tr>
           
        <th>Pesan</th>
          
        </tr>
    </thead>
    <tbody>
    @foreach($histories as $histories)
        <tr>
           
            <td>{!! $histories->message !!}</td>
           
        </tr>
    @endforeach
    </tbody>
</table>