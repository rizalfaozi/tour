
<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'Nama Depan:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Nama Belakang:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Umur:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Telp:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Alternative Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alternative_phone', 'Telp Alternative:') !!}
    {!! Form::text('alternative_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Alamat:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>



<!-- Id Card Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_card', 'No KTP:') !!}
    {!! Form::text('id_card', null, ['class' => 'form-control']) !!}
</div>



<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gender', 'Jenis Kelamin:') !!}<br>
     {{ Form::radio('gender', 'pria', isset($members) ? $members->gender == 'pria' : false) }} Pria<br>
    {{ Form::radio('gender', 'wanita', isset($members) ? $members->gender == 'wanita' : true) }} Wanita
</div>



<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Provinsi:') !!}
   <select class="form-control" name="province_id" id="province_id">
         <option value="0">Pilih Provinsi</option>
         @foreach($provinsi as $row)
         
                <option value="{{ $row->id }}" >{{ $row->name }}</option>
         
         @endforeach
    </select>
</div>

<!-- District Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district_id', 'Kabupaten:') !!}
    <select class="form-control" name="district_id" id="district_id"></select>
 
</div>

<!-- Subdistrict Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subdistrict_id', 'Kecamatan:') !!}
     <select class="form-control" name="subdistrict_id" id="subdistrict_id"></select>
    
   
</div>

<!-- Village Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('village_id', 'Kelurahan:') !!}
     <select class="form-control" name="village_id" id="village_id"></select>
     
</div>



<!-- Passport Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('passport_number', 'No Passpor:') !!}
    {!! Form::text('passport_number', null, ['class' => 'form-control']) !!}
</div>


<!-- Visa Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visa_number', 'No Visa:') !!}
    {!! Form::text('visa_number', null, ['class' => 'form-control']) !!}
</div>


<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}<br>
    {{ Form::radio('status', 1, isset($members) ? $members->status == 1 : false) }} Yes<br>
    {{ Form::radio('status', 0, isset($members) ? $members->status == 0 : true) }} No
    
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('members.index') !!}" class="btn btn-default">Batal</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){ 
    
    let provinsi = $('#province_id').val();
    $('#province_id').on('change', function() {
     kabupaten(this.value);
    });

    $('#district_id').on('change', function() {
     kecamatan(this.value);
    });

    $('#subdistrict_id').on('change', function() {
     kelurahan(this.value);
    });

    
       
      
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


  
  function kecamatan(id)
  {
   
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../kecamatan",
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
          // select  += '<option value="'+ respons[a]['id'] +'">'+ respons[a]['name'] +'</option';
              select  += "</option>";
             // kelurahan(respons[a]['id']);
         }   
          
        $('#subdistrict_id').html(select);

      },
    error: function (respons) {
      alert("Gagal Get katalog");
        
      }
  });
  }


  

  


  function kelurahan(id)
  {

    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
     $.ajax({
  type:"post",  
    url:"../kelurahan",
    data:{id:id,_token: CSRF_TOKEN},
    //dataType: "json",
    cache: false,
    success: function(respons){

        select = "";
         jmlData = respons.length;

         for(a = 0; a < jmlData; a++)
         {
             select  += "<option value='"+ respons[a]['id'] +"'>";
             select  += ""+ respons[a]['name'] +"";
             select  += "</option>";

         }   
           //
        $('#village_id').html(select);

      },
    error: function (respons) {
      alert("Gagal Get katalog");
        
      }
  });
  }


 
</script>

