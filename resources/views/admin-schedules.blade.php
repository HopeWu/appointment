<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <article class="today schedule">
        <h4>Schedules for Today:</h4>
        <div class="schedule">
            @foreach($todays as $item)

            @endforeach
            <table>
                <th></th>
                @foreach($todays as $item)
                    <tr>
                        <td>{{$item->start_end_time}}</td>
                        <td>1:30</td>
                        <td>type</td>
                        <td>Link</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </article>

    <article class="tomorrow schedule">
        <h4>Schedules for Tomorrow:</h4>
        <div class="grid"></div>
    </article>

    <article class="the-day-after-tomorrow schedule">
        <h4>Schedules for the Day after Tomorrow:</h4>
        <div class="grid"></div>
    </article>

    <article class="latest-20">
        <h4>Latest 20 Orders:</h4>
    </article>
</x-a-master>