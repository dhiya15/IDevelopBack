<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AttendanceConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;
    public $confirmation_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registration, $confirmation_link)
    {
        $this->registration = $registration;
        $this->confirmation_link = $confirmation_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("1IDJ'23 - Attendance Confirmation")
            ->view('emails.attendance.confirmation');
    }
}
