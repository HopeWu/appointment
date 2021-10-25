<x-master>
    <main>
        <section class="appointment">
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <input id="date" placeholder="Select a date to schedule" name="date" type="date" value="{{old('date')}}">
                            @error("date")
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="time-slots">
                            @error("which_slot")
                            <p class="error">{{$message}}</p>
                            @enderror
                            @foreach($slots as $key => $slot)
                                <div>
                                    <input class="time_slot" type="radio" id="{{'slot-'.$key}}"
                                           name="which_slot" value="{{$key}}">
                                    <label class="" for="{{'slot-'.$key}}">{{$slot}}</label>
                                </div>
                            @endforeach
                        </div>
                    </article>
                </div>

                <button type="submit">Make this appointment now</button>
            </form>
        </section>
        <section class="promote">

        </section>
        <section class="introduction">

        </section>
    </main>
    <script type="text/javascript">
        let availableWeekdays = {{json_encode($availableWeekdays)}};
        let allFutureBooked = {!! json_encode($allFutureBooked) !!};
    </script>
</x-master>
