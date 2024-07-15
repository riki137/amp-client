<?php

declare(strict_types=1);

namespace Riki137\AmpClient\Response;

use function Amp\async;

class AsyncResponse extends \Symfony\Component\HttpClient\Response\AsyncResponse
{
    public function __destruct()
    {
        async(parent::__destruct(...));
    }
}
