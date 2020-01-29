<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Producer\FFmpeg;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class VideoHeight
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Producer\FFmpeg
 * Cosmonova | Research & Development
 */
class VideoHeight extends Stage
{
    /** @var  int */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/file/video/height\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data        = $message->getArguments();
        $this->value = (int)($data[0] ?? 0);
    }

    /**
     * Frame height of the video file
     *
     * @return int|null
     */
    public function getValue(): ?int
    {
        return $this->value;
    }
}
