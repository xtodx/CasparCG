<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\OSC\Message\Stage;

use Xtodx\CasparCG\OSC\Message\Stage;
use Xtodx\CasparCG\OSC\RawMessage;

/**
 * Class Paused
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\OSC\Message\Stage
 * Cosmonova | Research & Development
 */
class Paused extends Stage
{
    /** @var  bool */
    protected $value;

    public static $pattern = '#^/channel/(\d+)/stage/layer/(\d+)/paused\x00*$#';

    /**
     * @inheritDoc
     */
    public function parseArguments(RawMessage $message)
    {
        $data        = $message->getArguments();
        $this->value = isset($data[0]) ? (bool)$data[0] : null;
    }

    /**
     * Whether the layer is paused or not
     *
     * @return bool|null
     */
    public function isValue(): ?bool
    {
        return $this->value;
    }
}
