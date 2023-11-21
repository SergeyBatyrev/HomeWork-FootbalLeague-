@extends('welcome')


@section('content')
    <div class="col-12">
        @if (Auth::check())
            <div class="col-2 d-flex align-items-center mb-1" style="white-space:nowrap;">
                <span class="">
                    <a class="btn btn-success fs-6 " href="{{ url('AddMatch') }}">
                        Add Match
                    </a>
                </span>
            </div>
        @endif
        <ul class="list-group col-12">
            @foreach ($m as $i)
                <li class="" style=""><a class="list-group-item d-flex" href="{{url('info/'.$i->id)}}" aria-current="true">
                        <div class="col-3 ml-3">{{ $result = substr($i->date, 0, -3) }}</div>
                        <div class="col-1 ml-4 " style="margin-right:28px ">{{ $i->FF->name }}</div>
                        <img class="ml-4" src="{{ $i->emblem1->emblem }}" alt="" width="28px" style="">
                        {{-- <div class="goals ml-4">
                        @if ($i->date <= $today)
                            @foreach ($user_info as $r)
                                @if ($i->id == $r->id_match)
                                    @if ($i->id_com1 == $r->id_com)
                                        {{ $r->total }}
                                    @endif
                                @endif
                            @endforeach
                        @else
                            -&nbsp;
                        @endif
                    </div> --}}
                        <div class=" ml-3">VS</div>
                        {{-- <div class="goals ml-1">
                        @if ($i->date <= $today)
                            @foreach ($user_info as $r)
                                @if ($i->id == $r->id_match)
                                    @if ($i->id == $r->id_match && $i->id_com2 == $r->id_com)
                                        {{ $r->total }}
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <span class="">-</span>
                        @endif
                    </div> --}}
                        <img class="ml-4" src="{{ $i->emblem2->emblem }}" alt="" width="28px">
                        <div class="ml-5" style="margin-left: 100px">{{ $i->FF2->name }}</div>
                        @if (Auth::check())
                            <div class="" style="margin-left:auto">
                                {!! Form::open(['route' => ['match.destroy', $i->id]]) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                <button class="btn btn-xs btn-danger ml-3" style="float:right; " type="submit"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg>
                                </button>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
