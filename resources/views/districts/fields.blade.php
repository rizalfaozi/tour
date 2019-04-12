<!-- Province Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('province_id', 'Provinsi:') !!}
    <select id="province_id" name="province_id" class="form-control">
    	 <option value="0">Pilih Provinsi</option>
    	 @foreach($provinces as $province)
          @if(isset($districts) ? $districts->province_id == $province->id : true))

          <option value="{{ $province->id }}" selected>{{ $province->name  }} </option>

          @else
             <option value="{{ $province->id }}">{{ $province->name  }} </option>
          @endif
         @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Kabupaten:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('districts.index') !!}" class="btn btn-default">Batal</a>
</div>
