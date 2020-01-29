<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Producer\FFmpeg;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class ProfilerTime
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Producer\FFmpeg
 * Cosmonova | Research & Development
 */
class Time extends Stage
{
    /** @var  float */
    protected $elapsed;
    /** @var  float */
    protected $total;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/file/time\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data          = $message->getArguments();
        $this->elapsed = (float)($data[0] ?? 0);
        $this->total   = (float)($data[1] ?? 0);
    }

    /**
     * Seconds elapsed on file playback
     *
     * @return float
     */
    public function getElapsed(): ?float
    {
        return $this->elapsed;
    }

    /**
     * Total Seconds
     *
     * @return float|null
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

}
