<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('office_name', 'Nama Kantor:') !!}
    {!! Form::text('office_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama Lengkap:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Password Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div> -->



<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Telp:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Provinsi:') !!}
     <select class="form-control" name="province_id" id="province_id">
         <option value="0">Pilih Provinsi</option>
         @foreach($provinsi as $row)
       
           @if(isset($agents) ? $agents->province_id == $row->id : true)
               <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
           @else
                <option value="{{ $row->id }}" >{{ $row->name }}</option>

           @endif
         
         @endforeach
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'Kabupaten:') !!}
    <select class="form-control" name="district_id" id="district_id"></select>
 
</div>

<!-- Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank', 'Bank:') !!}
    {!! Form::select('bank',  [''=>'Pilih Bank','mandiri'=>'Mandiri','bca'=>'BCA','bri'=>'BRI','bni'=>'BNI'],null, ['class' => 'form-control']) !!}
</div>

<!-- Account Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_number', 'No Rekening:') !!}
    {!! Form::text('account_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_name', 'Atas Nama:') !!}
    {!! Form::text('account_name', null, ['class' => 'form-control']) !!}
</div>


<!-- photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<?php if(Request::segment(2) !="create"){?>
<?php if(isset($agents) ? $agents->photo != '' : true){?>
<div class="form-group col-sm-6">
   
   <img width="50" src="{{ isset($agents) ? '/'.$agents->photo : true  }}">
</div>

<?php } }?>    

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Alamat:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Gender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Jenis Kelamin:') !!}<br>
     {{ Form::radio('gender', 'pria', isset($agents) ? $agents->gender == 'pria' : false) }} Pria<br>
    {{ Form::radio('gender', 'wanita', isset($agents) ? $agents->gender == 'wanita' : true) }} Wanita
</div>



<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
     {{ Form::radio('status', 1, isset($agents) ? $agents->status == 1 : false) }} Aktif<br>
    {{ Form::radio('status', 0, isset($agents) ? $agents->status == 0 : true) }} Tidak Aktif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agents.index') !!}" class="btn btn-default">Batal</a>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){ 
    
    let provinsi = $('#province_id').val();
    $('#province_id').on('change', function() {
     kabupaten(this.value);
    });

    
    if(provinsi !="")
    {   
       let kabupaten = $('#kabupaten').val(); 
       kabupaten_update(kabupaten,provinsi);
    }   
      
});


  function kabupaten(id)
  {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../kabupaten",
    data:{id:id,_token: CSRF_TOKEN},
    //dataType: "json",
    cache: false,
    success: function(respons){

        select = "";
         jmlData = respons.length;
         // select += '<option value="0">Pilih Kabupaten</option';
         for(a = 0; a < jmlData; a++)
         {
             select  += "<option value='"+ respons[a]['id'] +"'>";
             select  += ""+ respons[a]['name'] +"";
              select  += "</option>";
             

         }   
           
        $('#district_id').html(select);

      },
    error: function (respons) {
      alert("Error Kabupaten");
        
      }
  });

  }


function kabupaten_update(id,provinsi)
  {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../../kabupaten",
    data:{id:provinsi,_token: CSRF_TOKEN},
    //dataType: "json",
    cache: false,
    success: function(respons){

        select = "";
         jmlData = respons.length;
         // select += '<option value="0">Pilih Kabupaten</option';
         for(a = 0; a < jmlData; a++)
         {
            if(id == respons[a]['id'])
            {  
              select  += "<option value='"+ respons[a]['id'] +"' selected>";
              select  += ""+ respons[a]['name'] +"";
              select  += "</option>";
            
             }else{
                 select  += "<option value='"+ respons[a]['id'] +"'>";
                 select  += ""+ respons[a]['name'] +"";
                 select  += "</option>";


             }
         }   
           
        $('#district_id').html(select);

      },
    error: function (respons) {
      alert("Error Kabupaten");
        
      }
  });

  }
</script>  
