<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Producer\FFmpeg;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class VideoField
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Producer\FFmpeg
 * Cosmonova | Research & Development
 */
class VideoField extends Stage
{
    /** @var  string */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/file/video/field\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data        = $message->getArguments();
        $this->value = isset($data[0]) ? rtrim($data[0], "\0") : 'undefined type';
    }

    /**
     * Scan type of the video file, progressive or interlaced
     *
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
