<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Command\Mixer\Builder;

use Xtodx\CasparCG\Command\Basic\Builder\BaseBuilder;

/**
 * Class ClearBuilder
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Command\Mixer\Builder
 * Cosmonova | Research & Development
 *
 * @see     http://casparcg.com/wiki/CasparCG_2.0_AMCP_Protocol#MIXER_CLEAR
 */
class ClearBuilder extends BaseBuilder
{
    /**
     * @inheritDoc
     */
    public function build(): string
    {
        $channelAndLayer = $this->buildChannel();

        return "MIXER $channelAndLayer CLEAR";
    }

}
