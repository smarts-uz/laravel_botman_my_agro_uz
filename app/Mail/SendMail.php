<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->details['files']);
        $email = $this->subject('AGRO.uz')->view('myTestEmail');
        if($this->details['files']){
            foreach($this->details['files'] as $file){
                $email->attach(storage_path() . $file),
                [
                    'as' => $file,
                    'mime' => 'application/pdf',
                ]
                );
            }
        }


         return $this->subject('AGRO.uz')
        ->view('myTestEmail');

    }
}
