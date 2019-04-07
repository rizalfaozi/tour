@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agents
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agents, ['route' => ['agents.update', $agents->id], 'method' => 'patch']) !!}

                        @include('agents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection