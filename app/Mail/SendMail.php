<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
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
        // dd($this->details['files']);
        $email = $this->subject('AGRO.uz')->view('myTestEmail');
        if(isset($this->details['files'])){
            foreach($this->details['files'] as $file){
                // dd( pathinfo($file, PATHINFO_BASENAME));
                $email->attachData(storage_path($file),pathinfo($file, PATHINFO_BASENAME),
                [
                    'mime' => Storage::mimeType($file),
                ]
                );
            }
        }


         return $email;

    }
}
