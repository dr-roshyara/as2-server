<?php

namespace App\Observers;

use App\Models\AsMessage;

class AsMessageObserver
{
    /**
     * Handle the AsMessage "created" event.
     *
     * @param  \App\Models\AsMessage  $asMessage
     * @return void
     */
    public function created(AsMessage $asMessage)
    {
        //
        $this->handleMessages($asMessage);

    }

    /**
     * Handle the AsMessage "updated" event.
     *
     * @param  \App\Models\AsMessage  $asMessage
     * @return void
     */
    public function updated(AsMessage $asMessage)
    {
        //
         $this->handleMessages($asMessage);
    }

    /**
     * Handle the AsMessage "deleted" event.
     *
     * @param  \App\Models\AsMessage  $asMessage
     * @return void
     */
    public function deleted(AsMessage $asMessage)
    {
        //
    }

    /**
     * Handle the AsMessage "restored" event.
     *
     * @param  \App\Models\AsMessage  $asMessage
     * @return void
     */
    public function restored(AsMessage $asMessage)
    {
        //
    }


    /**
     * Handle the AsMessage "force deleted" event.
     *
     * @param  \App\Models\AsMessage  $asMessage
     * @return void
     */
    public function forceDeleted(AsMessage $asMessage)
    {
        //
    }

    /***
     * 
     * 
     *@param   \App\Models\AsMessage  $asMessage 
     *@return  void
     * 
     */

    private function handleMessages($asMessage){

        if($asMessage->getDirection() && $asMessage->getStatus() == 'success'){

            //TODO: Incoming Message Handling goes here
//            dd($asMessage);

            $asMessage->setStatus('processed');
            $asMessage->save();
        }
    }
}
