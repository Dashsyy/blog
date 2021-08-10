@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('category_create'))
                    <p>{!! session('category_create') !!}</p>
                @endif
                <a class="btn btn-primary" href="{!! url('category') !!}">Goto list</a>
                {!! Form::open(['url' => 'category']) !!}
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', '',array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
                <br>
                {!! Form::submit('Create',array('class'=> 'secondary-cart-btn')) !!}
                {!! Form::close() !!}
                <br>

            </div>
        </div>
        <div style="height: 100vh"></div>
        <div class="card mb-4">
            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
        </div>
    </div>
</main>
@endsection
