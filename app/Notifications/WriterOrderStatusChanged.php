<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WriterOrderStatusChanged extends Notification
{
    use Queueable;
    public Order $order;
    public User $order_owner;
    public User $writer;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order, User $order_owner, User $writer)
    {
        $this->order = $order;
        $this->order_owner = $order_owner;
        $this->writer = $writer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Status Changed')
            ->greeting('Hello ' . $this->writer->name . '!')
            ->line('The status of an order for user ' . $this->order_owner->name . ' has been changed.')
            ->line('Order Title: ' . $this->order->title)
            ->line('New Status: ' . $this->order->status)
            ->line('New Payment Status: ' . $this->order->payment->status)
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Please check the details and take the necessary actions.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
