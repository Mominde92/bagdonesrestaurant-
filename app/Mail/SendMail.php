<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $emailContent;
    public $type;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailContent,$type,$subject)
    {
        $this->emailContent = $emailContent;
        $this->type = $type;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $type=$this->type;
        if ($type=='verification'){
        return $this->from('no-replay@outlook.com')
            ->text('send_email/verification_email_text')
            ->view('send_email/verification_email')
            ->with([
            'content' => $this->emailContent,
        ])->subject($this->subject);
        }

        elseif ($type=='forget_password'){
            return $this->from('no-replay@outlook.com')
                ->text('send_email/reset_email_text')
                ->view('send_email/reset_email')
                ->with([
                'content' => $this->emailContent,
            ]);
        }

        elseif ($type=='password_change'){
            $emailData = $this->emailContent;

            return $this->from('no-replay@outlook.com')
                ->text('send_email/password_changed_email_text', compact(['emailData']))
                ->view('send_email/password_changed_email', compact(['emailData']));
        }

    }
}
