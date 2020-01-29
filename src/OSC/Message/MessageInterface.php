<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message;

use Xtodx\CasparCG\EventManager;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Interface MessageInterface
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message
 * Cosmonova | Research & Development
 */
interface MessageInterface
{
    /**
     * Create Message model from raw object data
     *
     * @param RawMessage $message
     *
     * @return $this
     */
    public static function create(RawMessage $message);

    /**
     * Set event manager
     *
     * @param EventManager $eventManager
     */
    public function setEventManager(EventManager $eventManager);

    /**
     * Get event manager
     *
     * @return EventManager
     */
    public function getEventManager(): EventManager;

    /**
     * Dispatch event
     *
     * @return mixed
     */
    public function dispatch();

    /**
     * @param \Xtodx\CasparCG\OSC\RawMessage $message
     */
    public function parseArguments(RawMessage $message);
}
