<?php

namespace App\Jobs;

use App\Models\Message;
use App\Notifications\MessageSentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSentMessages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected Message $message;
    /**
     * Create a new job instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Check if the message has been read
        if (!$this->message->read_at === null) {
            session()->flash('message', 'Message has been read already.');
            return;
        }
        // Send a notification to the recipient
        $this->message->receiver->notify(new MessageSentNotification($this->message));
    }
}
