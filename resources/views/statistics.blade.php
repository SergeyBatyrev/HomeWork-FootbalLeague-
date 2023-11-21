@extends('welcome')


@section('content')





<div class="col-sm-10 col-md-10 col-lg-10" style="margin: 0 auto">
    <h2 class="p-3 mb-2 bg-dark text-white text-center ">МАТЧИ</h2>
    <div>
        <ul class="list-group">
            @foreach ($m as $i)
                <li style=""><a class="list-group-item d-flex" href="#" aria-current="true">
                        <div class="col-3 ml-3">{{ $result = substr($i->date, 0, -3) }}</div>
                        <div class="col-1 ml-4 " style="margin-right:28px ">{{ $i->FF->name }}</div>
                        <img class="ml-4" src="{{ $i->emblem1->emblem }}" alt="" width="28px"
                            style="">
                        <div class="goals ml-4">
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
                        </div>
                        <div class=" ml-1">VS</div>
                        <div class="goals ml-1">
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
                        </div>
                        <img class="ml-4" src="{{ $i->emblem2->emblem }}" alt="" width="28px">
                        <div class="ml-2">{{ $i->FF2->name }}</div>
                    </a></li>
            @endforeach
        </ul>
    </div>
    <h2 class="p-3 mb-2 mt-5 bg-dark text-white text-center ">Турнирная таблица</h2>
    <div>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex align-items-center fs-5"
                style="justify-content:space-between;padding:0 40px; height:48px">
                <div>команда</div>
                <div class="d-flex justify-content-between" style="width: 180px">
                    <div title="Игры">И</div>
                    <div title="Выигрыши">В</div>
                    <div title="Нечьи">Н</div>
                    <div title="Проигрыши">П</div>
                    <div title="Мячи">М</div>
                </div>
                <div>очки</div>
            </li>
            <ul class="list-group-numbered " style="padding: 0">
                @foreach ($t_table as $tab)
                    <li class="list-group-item d-flex align-items-center "><a
                            class="list-group-item d-flex align-items-center justify-content-between" href="#"
                            aria-current="true" style="border: none; width:100%">
                            <div class="dannie d-flex justify-content-between col-2">
                                <div class="" style="">{{ $tab['name']}}</div>
                                <img class="ml-2" src='{{ $tab['emblem']}}' alt="" width="25px">
                            </div>
                            <div class="dannie d-flex justify-content-between "
                                style="width:180px; margin-left:-75px">
                                <div>
                                   
                                            <span>{{ $tab['games']}}</span>
                                    
                                </div>
                                <div class="wins">
                                    <span>{{ $tab['wins']}}</span>
                                </div>
                                <div class="nitrale">
                                    <span>{{ $tab['nit']}}</span>
                                </div>
                                <div class="lose">
                                    <span>{{ $tab['lose']}}</span>
                                </div>
                                <div class="summa">
                                    <span>{{ $tab['goals']}}</span>
                                </div>
                            </div>
                            <div class="gg" style="margin-right:20px">
                                <span>{{ $tab['points']}}</span>
                            </div>
                        </a></li>
                @endforeach
            </ul>
        </ul>
    </div>
    <h2 class="p-3 mb-2 mt-5 bg-dark text-white text-center ">Бомбардиры</h2>
    <div class="d-flex justify-content-between" style="">
        <div title="номер игрока">№</div>
        <div title="Имя">Имя</div>
        <div title="Клуб">Клуб</div>
        <div title="количество забитых голов">Голы</div>
    </div>
    <ul class="list-group-numbered " style="padding: 0">
        @foreach ($players as $pl)
            @foreach ($player as $p)
                @if ($pl->id_player == $p->id)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="col-3 d-flex align-items-center">
                            <div class="p-1"><img src="{{ $p->photo }}" alt="" width="60px"></div>
                            <div>{{ $p->name }}</div>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            @foreach ($t as $mm)
                                @if ($p->id_team == $mm->id)
                                    <div class=""><img src="{{ $mm->emblem }}" alt="" width="40px"></div>
                                    <div class="ml-3">{{$mm->name}}</div>
                                @endif
                            @endforeach
                        </div>
                        <div>{{ $pl->total }}</div>
                    </li>
                @endif
            @endforeach
        @endforeach


    </ul>




    <h2 class="p-3 mb-2 mt-5 bg-dark text-white text-center ">Ассистенты</h2>
    <div class="d-flex justify-content-between" style="">
        <div title="номер игрока">№</div>
        <div title="Имя">Имя</div>
        <div title="Клуб">Клуб</div>
        <div title="">ГП</div>
    </div>
    <ul class="list-group-numbered " style="padding: 0">
        @foreach ($assistent as $pl)
            @foreach ($player as $p)
                @if ($pl->assistant == $p->id)
                    <li class="list-group-item d-flex align-items-center justify-content-between">
                        <div class="col-3 d-flex align-items-center">
                            <div class="p-1"><img src="{{ $p->photo }}" alt="" width="60px"></div>
                            <div>{{ $p->name }}</div>
                        </div>
                        <div class="col-3 d-flex align-items-center">
                            @foreach ($t as $mm)
                                @if ($p->id_team == $mm->id)
                                    <div class=""><img src="{{ $mm->emblem }}" alt="" width="40px"></div>
                                    <div class="ml-3">{{$mm->name}}</div>
                                @endif
                            @endforeach
                        </div>
                        <div>{{ $pl->total }}</div>
                    </li>
                @endif
            @endforeach
        @endforeach


    </ul>
</div>

@endsection