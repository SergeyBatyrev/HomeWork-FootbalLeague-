@extends('welcome')

@section('content')

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


    {!! Form::model($News, ['action' => 'App\Http\Controllers\CalendaryController@storeMatch']) !!}

    <div class='form-group fs-2'>
        {!! Form::label('id_com1', 'Команда-1') !!}
        {!! Form::select('id_com1', $category, '', ['class' => 'form-control fs-3']) !!}
    </div>
    <div class='form-group fs-2'>
        {!! Form::label('id_com2', 'Команда-2') !!}
        {!! Form::select('id_com2', $category, '', ['class' => 'form-control fs-3']) !!}
    </div>
    <div class='form-group fs-2'>
        {!! Form::label('date', 'Дата') !!}
        {!! Form::input('datetime-local', 'date', '', array('class' => 'form-control')) !!}
        {{-- {!! Form::date('date','', ['class' => 'form-control fs-4']) !!} --}}
    </div>
    <div class='form-group fs-2'>
        {!! Form::label('win_com', 'выиграла*') !!}
        {!! Form::select('win_com', $category, '', ['class' => 'form-control fs-3','placeholder'=>'не обязательно']) !!}
    </div>
    <div class='form-group fs-2'>
        {!! Form::label('lose_com', 'проиграла*') !!}
        {!! Form::select('lose_com', $category, '', ['class' => 'form-control fs-3','placeholder'=>'не обязательно']) !!}
    </div>
    <div class='form-group fs-2'>
        {!! Form::label('id_city', 'Хозяин Матча') !!}
        {!! Form::select('id_city', $category, '', ['class' => 'form-control fs-3']) !!}
    </div>
   


    <button class="btn btn-success fs-2 mt-3" type="submit">Add Match</button>
    {!! Form::close() !!}
@endsection
