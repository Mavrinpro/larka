<?php
namespace App\Http\Controllers;
use Illuminate\Broadcasting\Channel;class TestNotification implements \Illuminate\Contracts\Broadcasting\ShouldBroadcastNow
{
    use \Illuminate\Foundation\Events\Dispatchable, \Illuminate\Broadcasting\InteractsWithSockets, \Illuminate\Queue\SerializesModels;

    public $data;

    /**
     * Create a new event instance.
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * The channel the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('my-channel');
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'posts';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return $this->data;
    }
}
