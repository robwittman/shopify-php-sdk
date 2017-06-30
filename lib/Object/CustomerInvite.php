<?php

namespace Shopify\Object;

class CustomerInvite extends AbstractObject
{
    protected $to;

    protected $from;

    protected $subject;

    protected $custom_message;

    protected $bcc;

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setCustomMessage($customMessage)
    {
        $this->custom_message = $customMessage;
        return $this;
    }

    public function getCustomMessage()
    {
        return $this->custom_message;
    }

    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

    public function getBcc()
    {
        return $this->bcc;
    }
}
