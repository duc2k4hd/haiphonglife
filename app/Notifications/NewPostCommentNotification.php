<?php

namespace App\Notifications;

use App\Models\PostComment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPostCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public PostComment $comment;

    public function __construct(PostComment $comment)
    {
        $this->comment = $comment;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bình luận mới trên bài viết của bạn')
            ->line("{$this->comment->author->name} đã bình luận:")
            ->line($this->comment->content)
            ->action('Xem bình luận', url("/posts/{$this->comment->post->slug}#comment-{$this->comment->id}"));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'comment_id' => $this->comment->id,
            'content' => $this->comment->content,
        ];
    }
}
