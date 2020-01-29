<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Stage;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class Time
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Stage
 * Cosmonova | Research & Development
 */
class Time extends Stage
{
    /** @var  float */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/time\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data        = $message->getArguments();
        $this->value = (float)($data[0] ?? 0);
    }

    /**
     * Seconds the layer has been active
     *
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }
}
