<x-master>
    <article class="confirm">
        <h6>
            <!--
            Please check the appointment before you continue to make the payment
            -->
            Vänligen kontrollera mötet innan du fortsätter att göra betalningen.
        </h6>
        <div>
            <p>
                Den {{$appt->date}}, från kl {{$start_end[0]}} till kl {{$start_end[1]}}, via ZOOM.
            </p>
        </div>
    </article>

    {!! $html_snippet !!}
</x-master>
