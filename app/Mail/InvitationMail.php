<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $id, $token, $user_name, $organization;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $token, $user_name, $organization)
    {
        $this->id = $id;
        $this->token = $token;
        $this->user_name = $user_name;
        $this->organization = $organization;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user_name = $this->user_name ?? "User";
        return $this->from(['address' => config('mail.from.address'), 'name' => 'Lucas from PowerMarket'])
        ->subject("{$user_name} has invited you to join their workspace on PowerMarket")
        ->view("emails.invite")->with([
            'user_name' => $this->user_name,
            'link' => route('invitation.create')."?id={$this->id}&token={$this->token}",
            'organization' => $this->organization
        ]);
    }
}
