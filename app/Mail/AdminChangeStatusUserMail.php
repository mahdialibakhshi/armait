<?php

namespace App\Mail;

use App\Models\MailMessages;
use App\Models\UserMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminChangeStatusUserMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $user;
    protected $title;
    protected $text;
    protected $note;
    protected $user_mail;

    public function __construct($user, $title, $text, $note, $user_mail)
    {
        $this->user = $user;
        $this->title = $title;
        $this->text = $text;
        $this->note = $note;
        $this->user_mail = $user_mail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $user_mail = $this->user_mail;
        $user_mail = UserMail::where('id', $user_mail)->first();
        $user_mail->update(['status' => 1]);
        return new Content(
            markdown: 'emails.adminchangestatususer',
            with: ['text' => $this->text, 'note' => $this->note]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

