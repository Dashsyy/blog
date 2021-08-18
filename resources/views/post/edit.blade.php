@extends('admin.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Static Navigation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">

                @if(Session::has('post_update'))
                <p>{!! session('post_update') !!}</p>
                @endif
                <a class="btn btn-primary" href="{!! url('post') !!}">Goto list</a>
                <br>

                
                {!! Form::model($posts , array('route' => array('post.update', $posts->id), 'method'=>'PUT','files'=>'true')) !!}

                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',$categories, $posts->category_id, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                <br>
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('title') }}</span>
                <br>
                {!! Form::label('author', 'Author:') !!}
                {!! Form::text('author',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('author') }}</span>
                <br>
                {!! Form::label('image', 'Image:') !!}
                {!! Form::file('image',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('image') }}</span>
                <br>
                {!! Form::label('short_desc', 'Short Desc:') !!}
                {!! Form::text('short_desc',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('short_desc') }}</span>
                <br>
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
                <span class="text-danger">{{ $errors->first('description') }}</span>
                <br>

                {!! Form::submit('Update record', array('class'=>'secondary-cart-btn')) !!}
                {!! Form::close() !!}

               

            </div>
        </div>
    </div>
</main>
@endsection