@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Provinsi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($provinces, ['route' => ['provinces.update', $provinces->id], 'method' => 'patch']) !!}

                        @include('provinces.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection