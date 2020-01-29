<?php
declare(strict_types=1);

namespace Xtodx\CasparCG;

use Xtodx\CasparCG\OSC\Message\MessageInterface;

/**
 * Interface ListenerInterface
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG
 * Cosmonova | Research & Development
 */
interface ListenerInterface
{
    /**
     * @param MessageInterface $message
     */
    public function handleMessage(MessageInterface $message);
}
