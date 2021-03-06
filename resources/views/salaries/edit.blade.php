@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gaji Agen / Kordinator
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($salaries, ['route' => ['salaries.update', $salaries->id], 'method' => 'patch']) !!}

                        @include('salaries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection