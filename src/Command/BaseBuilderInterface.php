<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Command;

/**
 * Interface BaseBuilderInterface
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Command
 * Cosmonova | Research & Development
 */
interface BaseBuilderInterface
{
    /**
     * Set Channel number
     *
     * @param int $channel
     *
     * @return BaseBuilderInterface
     */
    public function channel(int $channel): BaseBuilderInterface;
}
