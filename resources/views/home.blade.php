<x-master>
    <main>
        <article class="fill-form">
            <header>
                <h1 id="fill-form">Make An Appointment With Our Best</h1>
                <h1 id="now">Now</h1>
            </header>
            <form method="post" class="appointment" action="/appointment">
                @csrf
                <div class="date flex-center">
                    <input id="date" placeholder="Select a date" name="date" type="date"
                           value="{{old('date')}}">
                </div>
                @error("date")
                <p class="error">{{$message}}</p>
                @enderror
                <div class="appointment">
                    <div class="schedule">
                        <div class="time-slots">
                            @foreach($slots as $key => $slot)
                                <div>
                                    <input class="time_slot" type="radio" id="{{'slot-'.$key}}"
                                           name="which_slot" value="{{$key}}">
                                    <label class="" for="{{'slot-'.$key}}">{{$slot}}</label>
                                </div>
                            @endforeach
                            @error("which_slot")
                            <p class="error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit">Schedule</button>
            </form>
        </article>


        <section class="promote">
        </section>
        <section class="introduction">
        </section>
    </main>
    <script type="text/javascript">
        let availableWeekdays = {{json_encode($availableWeekdays)}};
        let allFutureBooked = {!! json_encode($allFutureBooked) !!};
        let all_slots = {!! json_encode($slots) !!};
    </script>
</x-master>
