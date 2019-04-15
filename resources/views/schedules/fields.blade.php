<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label("user_id", "Jama'ah:") !!}
    <select  name="member_id" id="selectID"  class="form-control user_id">
        <option value="0">Pilih Jama'ah</option>
         @foreach($members as $member)
          @if(isset($invoices) ? $invoices->member_id == $member->id : true))

          <option value="{{ $member->id }}" selected>{{ $member->first_name  }} {{ $member->last_name }}</option>

          @else
             <option value="{{ $member->id }}">{{ $member->first_name  }} {{ $member->last_name }}</option>
          @endif
         @endforeach
    </select>
</div>

<!-- Invoice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice_id', 'Kode Invoice:') !!}
    <input type="hidden" name="invoice_id" class="form-control" id="invoice_id">
    <input type="text"  class="form-control" id="invoice_number" disabled="disabled">
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Paket:') !!}
    {!! Form::hidden('category_id', null, ['class' => 'form-control']) !!}
    <input type="text"  class="form-control" id="category" disabled="disabled">
</div>

<!-- Departure Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('departure_date', 'Departure Date:') !!}
    {!! Form::text('departure_date', null, ['class' => 'form-control date']) !!}
   <!--  <input type="text"  class="form-control" id="departure" disabled="disabled"> -->
</div>

<!-- Flight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('flight', 'Pesawat Penerbangan:') !!}
    {!! Form::text('flight', null, ['class' => 'form-control']) !!}
</div>


<!-- Airport Field -->
<div class="form-group col-sm-6">
    {!! Form::label('airport', 'Bandar Udara Tujuan:') !!}
    {!! Form::text('airport', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hotel', 'Hotel:') !!}
    {!! Form::text('hotel', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
     {{ Form::radio('status', 1, isset($schedule) ? $schedule->status == 1 : false) }} Sesuai Jadwal<br>
    {{ Form::radio('status', 0, isset($schedule) ? $schedule->status == 0 : true) }} Tunda
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('schedules.index') !!}" class="btn btn-default">Batal</a>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){ 
    
    let user_id = $('.user_id').val();  
    $('.user_id').on('change', function() {
      
        invoice(this.value);
         //console.log(this.value);
    
    });

    if(user_id !="")
    {
         invoice_update(user_id);
    }    
    
 });

function invoice(member_id){

     let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../reqinvoices",
    data:{member_id:member_id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){
       
        $('#invoice_id').val(respons[0].invoice_number);
        $('#category_id').val(respons[0].category_id);

        $('#invoice_number').val(respons[0].invoice_number);
        $('#category').val(respons[0].name);
        $('#departure_date').val(respons[0].departure_date);
        //$('#departure').val(respons[0].departure_date); 
      },
    error: function (respons) {
      //alert("Error paket");
        
      }
  });

}
   
function invoice_update(member_id){

     let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../../reqinvoices",
    data:{member_id:member_id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){
       
        $('#invoice_id').val(respons[0].invoice_number);
        $('#category_id').val(respons[0].category_id);

        $('#invoice_number').val(respons[0].invoice_number);
        $('#category').val(respons[0].name);
        $('#departure_date').val(respons[0].departure_date);
        //$('#departure').val(respons[0].departure_date); 
      },
    error: function (respons) {
      //alert("Error paket");
        
      }
  });

}
</script>
