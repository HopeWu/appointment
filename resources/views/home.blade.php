<x-master>
    <main>
        <section class="appointment">
            <form class="appointment" action="/appointment">
                <div class="wrapper">
                    <article class="schedule">

                        <div class="date">
                            <label for="date">Which day would you like to schedule?</label>
                            <input id="date" name="date" type="date">
                        </div>

                        <div class="time-slots">
                            <div>
                                <input class="time_slot" type="radio" id="slot-1" name="which_slot" value="slot-1">
                                <label class="unchecked" for="slot-1">08:30~10:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-2" name="which_slot" value="slot-2">
                                <label class="unchecked" for="slot-2">10:30~12:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-3" name="which_slot" value="slot-3">
                                <label class="unchecked" for="slot-3">14:30~16:00</label>
                            </div>
                            <div>
                                <input class="time_slot" type="radio" id="slot-4" name="which_slot" value="slot-4">
                                <label class="unchecked" for="slot-4">16:30~18:00</label>
                            </div>
                        </div>
                    </article>
                    <article class="custom-info">
                        <div class="wrapper">
                            <div class="labels">
                                <label for="customer_name">Your name: </label>
                                <label for="email">Email: </label>
                                <label for="tel">Tel: </label>
                            </div>
                            <div class="inputs">
                                <input name="customer_name" type="text" id="customer_name">
                                <input name="email" type="email" id="email">
                                <input name="tel" type="text" id="tel">
                            </div>
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


    <footer>

    </footer>
</x-master>
