<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Stage;

use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class BackgroundType
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Stage
 * Cosmonova | Research & Development
 */
class BackgroundType extends Type
{
    /** @var  string */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/background/type\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data        = $message->getArguments();
        $this->value = isset($data[0]) ? rtrim($data[0], "\0") : 'unknown background type';
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }
}
