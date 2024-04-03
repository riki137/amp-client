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
class LastChunk extends DataChunk
{
    public function isLast(): bool
    {
        return true;
    }
}
