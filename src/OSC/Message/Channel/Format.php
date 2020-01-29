<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Channel;

use Xtodx\CasparCG\OSC\Message\Channel;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class Format
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Channel
 * Cosmonova | Research & Development
 */
class Format extends Channel
{
    /** @var string */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/format\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data = $message->getArguments();

        $this->value = rtrim($data[0], "\0") ?? 'Unknown format';
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
