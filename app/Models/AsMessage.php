<?php

namespace App\Models;

use AS2\MessageInterface;
use AS2\PartnerInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasEvents;

class AsMessage extends Model implements MessageInterface
{
    use HasFactory;
    use HasEvents;

    protected $table = 'as_messages';

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * Get the post that owns the comment.
     */
    public function sender()
    {
        return $this->belongsTo(AsPartner::class, 'sender_id');
    }

    /**
     * Get the post that owns the comment.
     */
    public function receiver()
    {
        return $this->belongsTo(AsPartner::class, 'receiver_id');
    }
    
    /**
    * Unique Message Id
    *
    * @return string
    */
    public function getMessageId()
    {
        return $this->id;
    }

    /**
     * @param  string  $id
     * @return $this
     */
    public function setMessageId($id)
    {
        return $this->id = $id;
    }

    /**
     * @param  string  $dir
     * @return $this
     */
    public function setDirection($dir)
    {
        return $this->direction = $dir;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param  string  $id
     * @return $this
     */
    public function setSenderId($id)
    {
        return $this->sender_id = $id;
    }

    /**
     * @return string
     */
    public function getSenderId()
    {
        return $this->sender_id;
    }

    /**
     * @return PartnerInterface
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param  PartnerInterface  $partner
     * @return $this
     */
    public function setSender(PartnerInterface $partner)
    {
        $this->setSenderId($partner->getAs2Id());

//        return $this->sender = $partner;
    }

    /**
     * @param  string  $id
     * @return $this
     */
    public function setReceiverId($id)
    {
        return $this->receiver_id = $id;
    }

    /**
     * @return string
     */
    public function getReceiverId()
    {
        return $this->receiver_id;
    }

    /**
     * @return PartnerInterface
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param  PartnerInterface  $partner
     * @return $this
     */
    public function setReceiver(PartnerInterface $partner)
    {
        $this->setReceiverId($partner->getAs2Id());

//        return $this->receiver = $partner;
    }

    /**
     * @return string
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param  string  $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        return $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @param  string  $payload
     * @return $this
     */
    public function setPayload($payload)
    {
        return $this->payload = $payload;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param  string  $status
     * @return $this
     */
    public function setStatus($status)
    {
        return $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatusMsg()
    {
        return $this->status_msg;
    }

    /**
     * @param  string  $msg
     * @return $this
     */
    public function setStatusMsg($msg)
    {
        return $this->status_msg = $msg;
    }

    /**
     * @return string
     */
    public function getMdnMode()
    {
        return $this->mdn_mode;
    }

    /**
     * @param  string  $status
     * @return $this
     */
    public function setMdnMode($status)
    {
        return $this->mdn_mode = $status;
    }

    /**
     * @return string
     */
    public function getMdnStatus()
    {
        return $this->mdn_status;
    }

    /**
     * @param  string  $status
     * @return $this
     */
    public function setMdnStatus($status)
    {
        return $this->mdn_status = $status;
    }

    /**
     * @return string
     */
    public function getMdnPayload()
    {
        return $this->mdn;
    }

    /**
     * @param  mixed  $mdn
     * @return $this
     */
    public function setMdnPayload($mdn)
    {
        return $this->mdn = $mdn;
    }

    /**
     * @return string
     */
    public function getMic()
    {
        return $this->mic;
    }

    /**
     * @param  string  $mic
     * @return $this
     */
    public function setMic($mic)
    {
        return $this->mic = $mic;
    }

    /**
     * @return bool
     */
    public function getSigned()
    {
        return $this->signed;
    }

    /**
     * @param  bool  $val
     * @return $this
     */
    public function setSigned($val = true)
    {
        return $this->signed = $val;
    }

    /**
     * @return bool
     */
    public function getEncrypted()
    {
        return $this->encrypted;
    }

    /**
     * @param  bool  $val
     * @return $this
     */
    public function setEncrypted($val = true)
    {
        return $this->encrypted = $val;
    }

    /**
     * @return bool
     */
    public function getCompressed()
    {
        return $this->compressed;
    }

    /**
     * @param  bool  $val
     * @return $this
     */
    public function setCompressed($val = true)
    {
        return $this->compressed = $val;
    }
}
