<!-- Member Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label("member_id", "Jama'ah:") !!}
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


   
<input type="hidden" name="user_id" id="user_id" class="form-control">

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Paket:') !!}
    <select name="category_id" id="paket_id"  class="form-control ">
        <option value="0">Pilih Paket</option>
         @foreach($categories as $category)
           @if(isset($invoices) ? $invoices->category_id == $category->id : true))
             <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
           @else
             <option value="{{ $category->id }}">{{ $category->name }}</option>
           @endif

          
         @endforeach
    </select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total pembayaran Rp:') !!}
    <input type="text" name="total" id="total" class="form-control" >

  
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Jumlah dibayarkan Rp:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}<br>
    {{ Form::radio('type', 'dp', isset($invoices) ? $invoices->type == 'dp' : false) }} DP<br>
    {{ Form::radio('type', 'lunas', isset($invoices) ? $invoices->type == 'lunas' : true) }} Lunas
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
    {{ Form::radio('status', 1, isset($invoices) ? $invoices->status == 1 : false) }} Publish<br>
    {{ Form::radio('status', 0, isset($invoices) ? $invoices->status == 0 : true) }} Draft
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('invoices.index') !!}" class="btn btn-default">Batal</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){ 
    
      let category_id = $('#paket_id').val();
       let user_id = $('.user_id').val();
    $('#paket_id').on('change', function() {
      if(category_id !="")
      {
        paket_update(this.value);

      }else{  
         paket(this.value);
      } 
    
    });


    $('.user_id').on('change', function() {
    
         if(user_id !="")
      {
        user_update(this.value);

      }else{  
         user(this.value);
      } 
     
    });
   

    if(category_id !="")
    {
       paket_update(category_id);

    }  


    if(user_id !="")
    {
       user_update(user_id);

    }  
       
      
});


 function user(id)
{
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../user",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#user_id').val(respons);
      
      },
    error: function (respons) {
      alert("Error paket");
        
      }
  });


}

function paket(id)
{
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../paket",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#total').val(respons);
      
      },
    error: function (respons) {
      alert("Error paket");
        
      }
  });


}

function paket_update(id){
let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../../paket",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#total').val(respons);
      
      },
    error: function (respons) {
      alert("Error paket");
        
      }
  });

}


function user_update(id)
{
  let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../../user",
    data:{id:id,_token: CSRF_TOKEN},
   
    cache: false,
    success: function(respons){

       
        $('#user_id').val(respons);
      
      },
    error: function (respons) {
      alert("Error paket");
        
      }
  });


}

</script>
