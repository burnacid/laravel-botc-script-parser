<x-print-layout>
    <div class="print-hidden">
        Please use the print option of your browser to print this script on paper or turn it into a PDF
    </div>
    <div class="title">
        {{$title}}
    </div>
    <div class="team good">
        <div class="title">Townsfolk</div>
        <div class="roles">
            @foreach($roles->where("team","townsfolk") as $role)
                <div class="role">
                    <div class="icon">
                        <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                    </div>
                    <div class="ability">
                        <div class="role-name">{{$role->name}}</div>
                        {!! $role->formattedAbility()  !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="team good">
        <div class="title">Outsider</div>
        <div class="roles top-line">
            @foreach($roles->where("team","outsider") as $role)
                <div class="role">
                    <div class="icon">
                        <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                    </div>
                    <div class="ability">
                        <div class="role-name">{{$role->name}}</div>
                        {!! $role->formattedAbility()  !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="team bad">
        <div class="title">Minion</div>
        <div class="roles top-line">
            @foreach($roles->where("team","minion") as $role)
                <div class="role">
                    <div class="icon">
                        <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                    </div>
                    <div class="ability">
                        <div class="role-name">{{$role->name}}</div>
                        {!! $role->formattedAbility()  !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="team bad">
        <div class="title">Demon</div>
        <div class="roles top-line">
            @foreach($roles->where("team","demon") as $role)
                <div class="role">
                    <div class="icon">
                        <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                    </div>
                    <div class="ability">
                        <div class="role-name">{{$role->name}}</div>
                        {!! $role->formattedAbility()  !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="footer">
        * not the first night

    </div>
    <div class="footer">
        <div class="float-left font-light">&copy; art by The Pandemonium Institute</div>
    </div>
    <div class="pagebreak"></div>

    <div class="title">
        <div class="sheet">First Night</div>
        <div class="name">Test</div>
    </div>
    @foreach($roles->where("firstNight","!=",null)->sortBy("firstNight") as $role)
        <div class="reminder {{$role->team}}">
            <div class="icon">
                @if($role->image)
                    <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                @else
                @endif
            </div>
            <div class="ability">
                <span class="role-name"><strong>{{$role->name}}</strong></span>
{{--                @if($role->ability)--}}
{{--                   <span class="ability-text">{{$role->ability}}</span>--}}
{{--                @endif--}}
                <br/>
                <span class="reminder-text">{{ $role->firstNightReminder }}</span>
            </div>
        </div>
    @endforeach

    <div class="pagebreak"></div>

    <div class="title">
        <div class="sheet">Other Nights</div>
        <div class="name">Test</div>
    </div>
    @foreach($roles->where("otherNight","!=",null)->sortBy("otherNight") as $role)
        <div class="reminder {{$role->team}}">
            <div class="icon">
                @if($role->image)
                    <img class="role-icon" src="{{ asset('storage/roles/'.$role->image) }}" >
                @else
                @endif
            </div>
            <div class="ability">
                <span class="role-name"><strong>{{$role->name}}</strong></span>
{{--                @if($role->ability)--}}
{{--                    <span class="ability-text">{{$role->ability}}</span>--}}
{{--                @endif--}}
                <br/>
                <span class="reminder-text">{{ $role->otherNightReminder }}</span>
            </div>
        </div>
    @endforeach
</x-print-layout>
