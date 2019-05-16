<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewSubmissionNotification extends Notification
{
    use Queueable;
    public $sub_id;
    protected $submission;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sub_id,$submission)
    {
        $this->sub_id = $sub_id;
        $this->submission = $submission;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'sub_id' =>  $this->sub_id,
            'first_name' =>  $this->submission->fname,
            'last_name' =>  $this->submission->lname,
            'user' => $notifiable
        ];
    }
   

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
