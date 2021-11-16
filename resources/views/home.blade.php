<x-master>
    <main>
        <article>
            <h1 id="fill-form">Make An Appointment With Our Best Now</h1>
            <form method="post" class="appointment" action="/appointment">
                <div class="appointment">
                    @csrf
                    <div class="schedule">
                        <div class="time-slots">
                            <div class="date">
                                <input id="date" placeholder="Select a date" name="date" type="date"
                                       value="{{old('date')}}">
                                @error("date")
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
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
                <button type="submit">Let Us Help</button>
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
