@extends('welcome')
{{-- @section('title', 'Page Title') --}}
{{-- @section('menu')
    @parent
@endsection --}}

@section('content')
    <div class="row fs-2"style="">
        <div class="label label-info mt-3" style="display:inline-block;text-align:center;background-color:green">
            {{ $page }}
        </div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


    </div>
    <div class="row fs-2" style="">

        @if ($id == 0)
            {!! Form::model($News, ['action' => 'App\Http\Controllers\NewsController@store', 'files' => true]) !!}


            <div class='form-group fs-2'>
                {!! Form::label('date', 'дата') !!}
                {!! Form::date('date', '', ['class' => 'form-control fs-4']) !!}
            </div>
            <div class='form-group fs-2'>
                {!! Form::label('short_description', 'Short text') !!}
                {!! Form::text('short_description', '', ['class' => 'form-control fs-4']) !!}
            </div>
            <div class='form-group fs-2'>
                {!! Form::label('full_text', 'Article') !!}
                {!! Form::text('full_text', '', ['class' => 'form-control fs-4']) !!}
            </div>

            <div class='form-group'>
                {!! Form::label('image', 'Upload image', ['class' => 'btn btn-success fs-2 mt-4', 'style' => 'color:white']) !!}
                {!! Form::file('image', ['class' => 'btn btn-success fs-4 mt-4', 'style' => 'display:none']) !!}
            </div>
            <button class="btn btn-success fs-2 mt-3" type="submit">Add</button>
            {!! Form::close() !!}
        @endif


        @if ($id != 0)
            {!! Form::model($News, ['route' => ['news.update', $id], 'files' => true, 'method' => 'PUT']) !!}
            <div class='form-group fs-2'>
                {!! Form::label('date', 'дата') !!}
                {!! Form::date('date', $block->date, ['class' => 'form-control fs-4']) !!}
            </div>
            <div class='form-group fs-2'>
                {!! Form::label('short_description', 'Short text') !!}
                {!! Form::text('short_description', $block->short_description, ['class' => 'form-control fs-4']) !!}
            </div>
            <div class='form-group fs-2'>
                {!! Form::label('full_text', 'Article') !!}
                {!! Form::text('full_text', $block->full_text, ['class' => 'form-control fs-4']) !!}
            </div>
            <div class='form-group'>
                {!! Form::label('image', 'Upload image', ['class' => 'btn btn-success fs-2 mt-4', 'style' => 'color:white']) !!}
                {!! Form::file('image', ['class' => 'btn btn-success fs-4 mt-4', 'style' => 'display:none']) !!}
            </div>
            <button class="btn btn-success fs-2 mt-3" type="submit">Add</button>
            {!! Form::close() !!}
        @endif
    </div>
@endsection
