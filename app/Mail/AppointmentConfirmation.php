<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $appointment;
    public $start_end;
    public $join_url;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->start_end = explode('-', $appointment->start_end_time);
        $this->appointment = $appointment;
        $this->join_url = $appointment->zoom_join_url;
        $this->password = $appointment->zoom_meeting_pw;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('service@relationsutveckling.se', 'relationsutveckling')
            ->subject('Appointment Scheduled')
            ->view('emails.appointment-confirmation');
    }
}
