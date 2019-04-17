<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyPatientRDV extends Mailable
{
    use Queueable, SerializesModels;

    public $patient_first_name;
    public $RdvDate;
    public $RdvTime;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient_first_name, $RdvDate, $RdvTime)
    {
        $this->patient_first_name = $patient_first_name;
        $this->RdvDate = $RdvDate;
        $this->RdvTime = $RdvTime;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.patient.rdv');
    }
}
