@extends('welcome')


@section('content')
    {{-- <pre>{{ $user_info }}</pre> --}}

    <div class="">
        <div class="d-flex align-items-center justify-content-around bg-dark bg-gradient rounded text-white p-4">
            @foreach ($match as $m)
                <div class="text-center">
                    <div><img src=".{{ $m->FF->emblem }}" alt="" width="220px"></div>
                    <div class="fs-4">{{ $m->FF->name }}</div>
                </div>
                <div class="goals" style="font-size: 80px">
                    {{-- голы --}}
                    @foreach ($user_info as $r)
                        @if ($m->id == $r->id_match)
                            @if ($m->id_com1 == $r->id_com)
                                {{ $r->total }}
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="text-center fs-5" style="font-family:monospace">
                    <div>дата проведения матча</div>
                    <div>{{ $m->date }}</div>
                    <div class="mt-">стадион</div>
                    <div>{{ $m->FF3->name_stadium }}</div>
                </div>
                <div class="goals" style="font-size: 80px">
                    {{-- голы --}}
                    @foreach ($user_info as $r)
                        @if ($m->id == $r->id_match)
                            @if ($m->id_com2 == $r->id_com)
                                {{ $r->total }}
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="text-center">
                    <div><img src=".{{ $m->FF2->emblem }}" alt="" width="220px"></div>
                    <div class="fs-4">{{ $m->FF2->name }}</div>
                </div>
        </div>
        <div class="d-flex align-items-center justify-content-between mt-3">
            <div class="col-4" style="font-family:monospace">
                <p class="text-center fs-5">Команда</p>
                <ul>
                    @foreach ($player as $p)
                        @if ($p->id_team == $m->id_com1)
                        <li><img src=".{{$p->photo}}" alt="" width="45px">{{ $p->name }}<span style="float:right">{{$p->position}}</span></li>
                        @endif
                    @endforeach
                    <li class="mt-3"><p class=""><img src=".{{$m->FF->photo_coach}}" alt="" width="80px">{{$m->FF2->coach}} <span style="float:right">ТРЕНЕР</span></p></li>
                </ul>
            </div>
            <div class="col-4" style="font-family:monospace">
                <p class="text-center fs-5">Команда</p>
                <ul>
                    @foreach ($player as $p)
                        @if ($p->id_team == $m->id_com2)
                            <li><img src=".{{$p->photo}}" alt="" width="45px">{{ $p->name }}<span style="float:right">{{$p->position}}</span></li>
                        @endif
                    @endforeach
                    <li class="mt-3"><p class=""><img src=".{{$m->FF2->photo_coach}}" alt="" width="80px">{{$m->FF2->coach}} <span style="float:right">ТРЕНЕР</span></p></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
@endsection
