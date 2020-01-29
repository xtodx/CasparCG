<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Command\Basic\Builder;

use Xtodx\CasparCG\Command\BaseBuilderInterface;
use Xtodx\CasparCG\Command\CommandBuilderInterface;
use Xtodx\CasparCG\Command\SimpleBuilderInterface;
use Xtodx\CasparCG\Exception\ParamException;
use Xtodx\CasparCG\Exception\ParseException;

/**
 * Abstract Class BaseBuilder
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Command\Basic\Builder
 * Cosmonova | Research & Development
 */
abstract class BaseBuilder implements CommandBuilderInterface, SimpleBuilderInterface
{
    #region properties

    /** @var  int */
    protected $channel;
    /** @var  int */
    protected $layer;

    #endregion

    #region setters

    /**
     * @inheritDoc
     */
    public function channel(int $channel): BaseBuilderInterface
    {
        if ($channel < 0) {
            throw new ParamException('Channel value must be unsigned integer');
        }

        $this->channel = $channel;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function layer(int $layer): SimpleBuilderInterface
    {
        if ($layer < 0) {
            throw new ParamException('Layer value must be unsigned integer');
        }

        $this->layer = $layer;

        return $this;
    }

    #endregion

    #region builders

    /**
     * @return string
     * @throws ParseException
     */
    protected function buildChannel(): string
    {
        if (null === $this->channel) {
            throw new ParseException('Channel is required');
        }

        $channel = [$this->channel, $this->layer];
        $channel = array_filter($channel);

        return join('-', $channel);
    }

    #endregion
}
