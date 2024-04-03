<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Riki137\AmpClient\Chunk;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
class InformationalChunk extends DataChunk
{
    private array $status;

    public function __construct(int $statusCode, array $headers)
    {
        parent::__construct();
        $this->status = [$statusCode, $headers];
    }

    public function getInformationalStatus(): ?array
    {
        return $this->status;
    }
}
