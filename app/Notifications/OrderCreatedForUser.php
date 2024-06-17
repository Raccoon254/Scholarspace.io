<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedForUser extends Notification
{
    use Queueable;
    public Order $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your order has been successfully created.')
            ->line('Order Details:')
            ->line('Title: ' . $this->order->title)
            ->line('Description: ' . $this->order->description)
            ->line('Total Price: ' . $this->order->total_price)
            ->line('Status: ' . $this->order->status)
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for using our service!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'title' => $this->order->title,
            'description' => $this->order->description,
            'total_price' => $this->order->total_price,
        ];
    }
}
