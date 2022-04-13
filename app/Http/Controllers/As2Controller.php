<?php

namespace App\Http\Controllers;

use AS2\Utils;
use GuzzleHttp\Client;
use App\Models\AsPartner;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use AS2\Management;
use Illuminate\Http\Request;
use Monolog\Logger;
use App\Repositories\MessageRepository;
use App\Repositories\PartnerRepository;
use AS2\Server;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\As2SenderService;
use AS2\MessageRepositoryInterface;
// use App\Repositories\PartnerRepository;
use AS2\PartnerRepositoryInterface;
use Illuminate\Support\Facades\Log;

class As2Controller extends BaseController
{

     private $server;

     private PartnerRepositoryInterface $as2PartnerRepository;
     private MessageRepositoryInterface $as2MessageRepository;

     private $manager;

     private $senderService;

    /**
     *
     * Make controller
     * 
     *  */
    public function __construct(PartnerRepositoryInterface $as2PartnerRepository, 
    MessageRepositoryInterface $as2MessageRepository)
    {
       

        $this->partnerRepository = $as2PartnerRepository;
        
        $this->messageRepository = $as2MessageRepository;
        $this->manager = new Management();

        $this->senderService = new As2SenderService($this->partnerRepository, $this->messageRepository);

        $this->server = new Server(
            $this->manager,
            $this->partnerRepository,
            $this->messageRepository
        );
        // dd( public_path("/test/test.txt"));
        // dd("testing at last");
        $response = $this->senderService->sendFile('Partner_Nextred', public_path("/test/test.txt"));
        // $response =$this->senderService->sendFile((', $request->get('filePath'));
        // dd($response);
        dd("TESTing As2 Server");
        // var_dump($this->server);
        // dd($this->senderService);
    }

   public function send(Request $request)
   {
       $this->senderService->sendFile(
            $request->get('receiverId'), 
            $request->get('filePath')
        );
   }


    public function receive(ServerRequestInterface $request){
        Log::info(" Testing  as2 server "); 
        return $this->server->execute($request);
    }
    public function  index (){
       
    }

}
