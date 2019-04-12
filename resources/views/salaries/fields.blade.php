<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Agen:') !!}
    <select id="selectID" name="user_id" class="form-control user_id" >
        <option value="0">Pilih Agen</option>
        @foreach($agents as $agent)
           @if(isset($salaries) ? $salaries->user_id == $agent->id : true))
             <option value="{{ $agent->id }}" selected>{{ $agent->name }} - {{ $agent->type }}</option>
           @else
             <option value="{{ $agent->id }}">{{ $agent->name }} - {{ $agent->type }}</option>
           @endif
            
        @endforeach
    </select>
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label("count", "Total Closing Jama'ah:") !!}
    <input type="text" name="count" id="count" class="form-control">
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total Gaji:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commission', 'Komisi:') !!}
    {!! Form::text('commission', null, ['class' => 'form-control']) !!}
</div>



<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
    {{ Form::radio('status', 0, isset($members) ? $members->status == 0 : false) }} Pending<br>
    {{ Form::radio('status', 1, isset($members) ? $members->status == 1 : true) }} Sukses 
    
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salaries.index') !!}" class="btn btn-default">Batal</a>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){ 
    
      let user_id = $('.user_id').val();
    $('.user_id').on('change', function() {
         closing(this.value);
      //    if(user_id !="")
      // {
      //   closing_update(this.value);

      // }else{  
      //    closing(this.value);
      // } 
      
    
    });
   

     if(user_id !="")
    {
       closing_update(user_id);

    }  
       
      
});

function closing(id)
{
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../closing",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#count').val(respons);
         console.log(respons);
      },
    error: function (respons) {
      alert("Error closing");
        
      }
  });


}

function closing_update(id){
let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../../closing",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#count').val(respons.length);
      
      },
    error: function (respons) {
      alert("Error closing");
        
      }
  });

}

</script>

