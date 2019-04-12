<!-- Subdistrict Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subdistrict_id', 'Kecamatan:') !!}
    <select id="subdistrict_id" name="subdistrict_id" class="form-control">
    	 <option value="0">Pilih Kecamatan</option>
    	 @foreach($subdistricts as $subdistrict)
        
          @if(isset($villages) ? $villages->subdistrict_id == $subdistrict->id : true))

          <option value="{{ $subdistrict->id }}" selected>{{ $subdistrict->name  }} </option>

          @else
             <option value="{{ $subdistrict->id }}">{{ $subdistrict->name  }} </option>
          @endif
         @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Kelurahan:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('villages.index') !!}" class="btn btn-default">Batal</a>
</div>
