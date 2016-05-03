<?php

namespace Shopify\Exception;

use Exception;

abstract class Core extends Exception
{
    public function getHttpStatus()
    {

    }

    public function getHttpBody()
    {

    }

    public function getJsonBody()
    {

    }

    public function getHttpHeaders()
    {

    }

    public function getRequestId()
    {

    }

    public function __toString()
    {

    }
}
