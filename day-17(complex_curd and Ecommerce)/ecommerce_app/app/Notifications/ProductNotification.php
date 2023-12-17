<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductNotification extends Notification
{
    protected $product;
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Product Added: ' . $this->product->name)
            ->line('Dear ' . $notifiable->name . ',')
            ->line('We are excited to inform you that a new product has been added to our catalog.')
            ->line('Product Details:')
            ->line('Name: ' . $this->product->name)
            ->line('Description: ' . $this->product->description)
            ->line('Price: $' . number_format($this->product->price, 2))
            ->line('View Product: ' . url("/products/{$this->product->id}"))
            ->line('Thank you for choosing our products. If you have any questions, feel free to contact us.');
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
