<x-a-master>
    <div class="search-bar wrapper">
        <input type="text" name="search" placeholder="enter an email or a date">
        <div class="icon">
            <img src="{{asset('images/search_icon.png')}}" alt="search icon">
        </div>
    </div>
    <article class="today schedule">
        <h4>Schedules for Today:</h4>
        <div class="wrapper">
            <div class="morning">

            </div>
            <div class="afternoon">

            </div>
        </div>
    </article>

    <article class="tomorrow schedule">
        <h4>Schedules for Tomorrow:</h4>
        <div class="grid"></div>
    </article>

    <article class="the-day-after-tomorrow schedule">
        <h4>Schedules for Tomorrow:</h4>
        <div class="grid"></div>
    </article>

    <article class="latest-20">
        <h4>Latest 20 Orders:</h4>
    </article>
</x-a-master>