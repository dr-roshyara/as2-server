<?php

namespace App\Services;

use AS2\Management;
use AS2\Utils;
// use App\Repositories\MessageRepository;
use AS2\MessageRepositoryInterface;
// use App\Repositories\PartnerRepository;
use AS2\PartnerRepositoryInterface;

class As2SenderService
{

    // private $as2PartnerRepository;
    private PartnerRepositoryInterface $as2PartnerRepository;
    private MessageRepositoryInterface $as2MessageRepository;
    // private $as2MessageRepository;

    private $manager;

    /**
     *
     * Make controller
     *  */
    public function __construct(
         PartnerRepositoryInterface $as2PartnerRepository,
         MessageRepositoryInterface $as2MessageRepository)
    {
        // $this->as2PartnerRepository = new PartnerRepositoryInterface();
        // $this->as2MessageRepository = new MessageRepositoryInterface();
        $this->as2PartnerRepository =$as2PartnerRepository;
        $this->as2MessageRepository =$as2MessageRepository;
        $this->manager = new Management();
    }


    public function sendFile(string $receiverId, string $filePath)
    {   
        // if(!env('SENDER_ID', false)){
        //     throw new \RuntimeException(
        //         sprintf('SENDER_ID missing in .env file.')
        //     );
        // }
        //  dd("TEST");
        $senderId = env('SENDER_ID', false);
        // dd($senderId);
        // $senderId = env('test@test.de', false);
        $senderId ="Partner_Nextrend_Local";
        $receiverId ="Partner_Nextred";
        if (! empty($filePath)) {
            if (! file_exists($filePath)) {
                throw new \RuntimeException(
                    sprintf('File `%s` not found, please enter the correct file path.', $filePath)
                );
            }
        } else {

            // Default test message

            $rawMessage = <<<MSG
                Content-type: Application/EDI-X12
                Content-disposition: attachment; filename=payload
                Content-id: <test@test.com>
                
                ISA*00~
                MSG;
        }

        $sender = $this->as2PartnerRepository->findPartnerById($senderId);
        $receiver = $this->as2PartnerRepository->findPartnerById($receiverId);
        // dd($sender);
        // Initialize New Message
        $messageId = Utils::generateMessageID($sender);

        $message = $this->as2MessageRepository->createMessage();
        $message->setMessageId($messageId);
        $message->setSender($sender);
        $message->setReceiver($receiver);
     
        $this->as2MessageRepository->saveMessage($message);
        $message = $this->as2MessageRepository->findMessageById($messageId);

        // Generate Message Payload
        if (isset($rawMessage)) {
            $payload = $this->manager->buildMessage($message, $rawMessage);
        } else {
            $payload = $this->manager->buildMessageFromFile($message, $filePath);
        }
       
        // dd($message);
        // dd ("tesst");
        // Try to send a message
        $this->manager->sendMessage($message, $payload);
        $this->as2MessageRepository->saveMessage($message);

        return $message;
    }
}