<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Command\Basic\Builder;

/**
 * Class ResumeBuilder
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Command\Basic\Builder
 * Cosmonova | Research & Development
 *
 * @see     http://casparcg.com/wiki/CasparCG_2.0_AMCP_Protocol#RESUME
 */
class ResumeBuilder extends BaseBuilder
{
    /**
     * @inheritDoc
     */
    public function build(): string
    {
        $commandParts[] = 'RESUME';
        $commandParts[] = $this->buildChannel();

        $commandParts = array_filter($commandParts);
        $command      = join(' ', $commandParts);

        return $command;
    }
}
