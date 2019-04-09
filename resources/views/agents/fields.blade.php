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

<?php if(Request::segment(3) !="edit"){?>
<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<?php } ?>


<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Telp:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'photo:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<?php if($agents->photo !=""){?>
<div class="form-group col-sm-6">
   
   <img width="100" height="100" src="{{ '/'.$agents->photo }}">
</div>

<?php } ?>    

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
     {{ Form::radio('status', 1, isset($agents) ? $agents->status == 1 : false) }} Yes<br>
    {{ Form::radio('status', 0, isset($agents) ? $agents->status == 0 : true) }} No
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agents.index') !!}" class="btn btn-default">Cancel</a>
</div>
