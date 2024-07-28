<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class TaskDueSoon extends Notification
{
    use Queueable;

    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A task is due soon.')
                    ->action('View Task', url('/projects/' . $this->task->project_id))
                    ->line('Task: ' . $this->task->name);
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'task_id' => $this->task->id,
            'task_name' => $this->task->name,
            'project_id' => $this->task->project_id,
            'message' => 'A task is due soon.'
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
