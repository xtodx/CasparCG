<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Producer\FFmpeg;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class Frame
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Producer\FFmpeg
 * Cosmonova | Research & Development
 */
class Frame extends Stage
{
    /** @var  int */
    protected $elapsed;
    /** @var  int */
    protected $total;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/file/frame\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data          = $message->getArguments();
        $this->elapsed = (int)($data[0] ?? 0);
        $this->total   = (int)($data[1] ?? 0);
    }

    /**
     * Frames elapsed on file playback
     *
     * @return int|null
     */
    public function getElapsed(): ?int
    {
        return $this->elapsed;
    }

    /**
     * Total frames
     *
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }
}
