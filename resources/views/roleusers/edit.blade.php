@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Roleusers
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roleusers, ['route' => ['roleusers.update', $roleusers->id], 'method' => 'patch']) !!}

                        @include('roleusers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection