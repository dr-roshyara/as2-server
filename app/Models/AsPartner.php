<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use AS2\PartnerInterface;
use AS2\MessageInterface;



class AsPartner extends Model implements PartnerInterface
{
    use HasFactory;

    protected $table = 'as_partners';

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * Get the comments for the blog post.
     */
    public function sendMessages()
    {
        return $this->hasMany(AsMessage::class, 'sender_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function receivedMessages()
    {
        return $this->hasMany(AsMessage::class, 'receiver_id');
    }

    /**
     * AS2 Partner ID
     *
     * @return string
     */
    public function getAs2Id()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getTargetUrl()
    {
        return $this->target_url;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * @return string
     */
    public function getContentTransferEncoding()
    {
        return $this->content_transfer_encoding;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getAuthMethod()
    {
        return $this->auth;
    }

    /**
     * @return string
     */
    public function getAuthUser()
    {
        return $this->auth_user;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->auth_password;
    }

    /**
     * @return string|null
     */
    public function getSignatureAlgorithm()
    {
        return $this->signature_algorithm;
    }

    /**
     * @return string|null
     */
    public function getEncryptionAlgorithm()
    {
        return $this->encryption_algorithm;
    }

    /**
     * @return string
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->private_key;
    }

    /**
     * @return string
     */
    public function getPrivateKeyPassPhrase()
    {
        // TODO: Implement getPrivateKeyPassPhrase() method.
        return $this->private_key_pass_phrase;
    }

    /**
     * @return string [null, zlib, deflate]
     */
    public function getCompressionType()
    {
        return $this->compression;
    }

    /**
     * @return string [null, sync, async]
     */
    public function getMdnMode()
    {
        return $this->mdn_mode;
    }

    /**
     * @return string (Example: signed-receipt-protocol=optional, pkcs7-signature; signed-receipt-micalg=optional, SHA256)
     */
    public function getMdnOptions()
    {
        return $this->mdn_options;
    }

    /**
     * @return string (Example: Your requested MDN response from $receiver.as2_id$)
     */
    public function getMdnSubject()
    {
        return $this->mdn_subject;
    }
}
