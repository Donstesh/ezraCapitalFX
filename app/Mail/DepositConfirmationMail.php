<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Deposit;

class DepositConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deposit;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return void
     */
    public function __construct(Deposit $deposit)
    {
        // // Assign the deposit instance
        // $this->deposit = $deposit;
        // Pass the deposit data to the email view
        $this->deposit = $deposit->load('user'); // Ensure the user relationship is loaded
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Deposit has been Confirmed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.deposit.confirmation',
            with: [
                'deposit' => $this->deposit,
                'user' => $this->deposit->user,  // Assuming there is a user relation in the Deposit model
            ],
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
