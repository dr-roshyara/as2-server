<?php

namespace App\Repositories;

use AS2\MessageInterface;
use AS2\MessageRepositoryInterface;
use App\Models\AsMessage;
//use App\Events\MessageSaved;
use Illuminate\Support\Str;

class AsMessageRepository implements MessageRepositoryInterface
{
    private MessageRepositoryInterface $messageRepository;
    public function __construct(MessageRepositoryInterface $messageRepository)
    {
           $this->messageRepository =$messageRepository;
    }
    
    /**
     * @param string $id
     *
     * @return MessageInterface
     */
    public function findMessageById($id){
        return AsMessage::find($id);
    }

    /**
     * @param array $data
     *
     * @return MessageInterface
     */
    public function createMessage($data = []){
        return new AsMessage();
    }

    /**
     * @return bool
     */
    public function saveMessage(MessageInterface $message)
    {
        $message->save();
    }
}
