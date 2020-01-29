<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Command\Mixer\Builder;

use Xtodx\CasparCG\Command\Basic\Builder\BaseBuilder;
use Xtodx\CasparCG\Exception\ParamException;

/**
 * Class PerspectiveBuilder
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Command\Mixer\Builder
 * Cosmonova | Research & Development
 *
 * @see     http://casparcg.com/wiki/CasparCG_2.0_AMCP_Protocol#MIXER_PERSPECTIVE
 */
class PerspectiveBuilder extends BaseBuilder
{
    /** @var  float */
    protected $xTopLeft;
    /** @var  float */
    protected $yTopLeft;
    /** @var  float */
    protected $xTopRight;
    /** @var  float */
    protected $yTopRight;
    /** @var  float */
    protected $xBottomRight;
    /** @var  float */
    protected $yBottomRight;
    /** @var  float */
    protected $xBottomLeft;
    /** @var  float */
    protected $yBottomLeft;

    /**
     * Range 0 to 1 validator
     *
     * @param float[] $values
     *
     * @throws ParamException
     *
     */
    protected function validateValueRange(float ...$values)
    {
        foreach ($values as $value) {
            if ($value < 0 || $value > 1) {
                throw new ParamException('Value must be in range from 0 to 1');
            }
        }
    }

    /**
     * Set top left edge position
     *
     * @param float $x
     * @param float $y
     *
     * @return PerspectiveBuilder
     */
    public function topLeft(float $x, float $y): PerspectiveBuilder
    {
        $this->validateValueRange($x, $y);

        $this->xTopLeft = $x;
        $this->yTopLeft = $y;

        return $this;
    }

    /**
     * Set top right edge position
     *
     * @param float $x
     * @param float $y
     *
     * @return PerspectiveBuilder
     */
    public function topRight(float $x, float $y): PerspectiveBuilder
    {
        $this->validateValueRange($x, $y);

        $this->xTopRight = $x;
        $this->yTopRight = $y;

        return $this;
    }

    /**
     * Set bottom right edge position
     *
     * @param float $x
     * @param float $y
     *
     * @return PerspectiveBuilder
     */
    public function bottomRight(float $x, float $y): PerspectiveBuilder
    {
        $this->validateValueRange($x, $y);

        $this->xBottomRight = $x;
        $this->yBottomRight = $y;

        return $this;
    }

    /**
     * Set bottom left edge position
     *
     * @param float $x
     * @param float $y
     *
     * @return PerspectiveBuilder
     */
    public function bottomLeft(float $x, float $y): PerspectiveBuilder
    {
        $this->validateValueRange($x, $y);

        $this->xBottomLeft = $x;
        $this->yBottomLeft = $y;

        return $this;
    }

    /**
     * @param $x
     * @param $y
     *
     * @return string
     */
    protected function toStr($x, $y): string
    {
        $parts = [$x, $y];
        array_filter($parts);

        return join(' ', $parts);
    }

    /**
     * @return string
     */
    protected function buildTopLeft(): string
    {
        return $this->toStr($this->xTopLeft, $this->yTopLeft);
    }

    /**
     * @return string
     */
    protected function buildTopRight(): string
    {
        return $this->toStr($this->xTopLeft, $this->yTopLeft);
    }

    /**
     * @return string
     */
    protected function buildBottomRight(): string
    {
        return $this->toStr($this->xTopLeft, $this->yTopLeft);
    }

    /**
     * @return string
     */
    protected function buildBottomLeft(): string
    {
        return $this->toStr($this->xTopLeft, $this->yTopLeft);
    }

    /**
     * @inheritDoc
     */
    public function build(): string
    {
        $channelAndLayer = $this->buildChannel();
        $topLeft         = $this->buildTopLeft();
        $topRight        = $this->buildTopRight();
        $bottomRight     = $this->buildBottomRight();
        $bottomLeft      = $this->buildBottomLeft();

        $tail = '';

        if (strlen($topLeft) && strlen($topRight) && strlen($bottomRight) && strlen($bottomLeft)) {
            $tail = "$topLeft $topRight $bottomRight $bottomLeft";
        }

        return "MIXER $channelAndLayer PERSPECTIVE $tail";
    }
}
