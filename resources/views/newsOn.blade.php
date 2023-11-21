@extends('welcome')

@section('content')
    <div class="d-flex">
        <div class="col-8">
            @foreach ($Newsid as $b)
                @if (Auth::check())
                    <div class="col-2 d-flex align-items-center" style="white-space:nowrap;">
                        <span class="">
                            <a class="btn btn-success fs-6 " href="{{ url('AddNew') }}">
                                Add New
                            </a>
                        </span>
                        <span class="ml-3">
                            <a class=" btn btn-success fs-6" href="{{ url('AddNew/' . $b->id) }}">
                                Edit New
                            </a>
                        </span>
                        <span> {!! Form::open(['route' => ['news.destroy', $b->id]]) !!}

                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class="btn btn-xs btn-danger ml-3" style="" type="submit"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                </svg>
                            </button>
                            {!! Form::close() !!}
                        </span>
                    </div>
                @endif


                <div>
                    <!--Block's title-->
                    {{-- <h2>{{ $b->summary }}</h2> --}}
                </div>
                <p class="pre__text fs-3">{{ $b->short_description }}</p>


                @if ($b->imagesPath != '')
                    <div>
                        <a href="{{ url($b->imagesPath) }}" style="margin-right:20px" target="_blank" class="wrap-image">
                            <img src="{{ asset($b->imagesPath) }}" width="450px" alt="" />
                        </a>
                    </div>
                @endif
                <div>
                    <p class="pre__text fs-5">{{ $b->full_text }}</p>
                </div>
            @endforeach


        </div>
        <div>

            <ul style="list-style-type:none">
                @foreach ($News as $n)
                    <hr>

                    <li>
                        <div>{{ $gg = str_replace('-', '.', $n->date) }}</div>
                        <div>
                            <div><img src=".{{ $n->imagesPath }}" alt="" width="200px"></div>
                            <p class="fs-6" style="margin: 0">{{ $n->short_description }}</p>
                        </div>
                        <a class="fs-6" href="{{ url('news/' . $n->id) }}">
                            Read More
                        </a>
                    </li>
                @endforeach
            </ul>



        </div>
    </div>
@endsection
