<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseEnrolled extends Notification{

    public function __construct(public Course $course){
    }

    public function via($notifiable) : array{
        return ['mail'];
    }

    public function toMail($notifiable) : MailMessage{
        return (new MailMessage)
            ->subject('Вы записаны на курс')
            ->line("Вы успешно записаны на курс: {$this->course->title}")
            ->action('Перейти к курсу', url("/courses/{$this->course->id}"));
    }
}
