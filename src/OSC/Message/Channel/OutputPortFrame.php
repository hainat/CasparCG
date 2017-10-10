<?php
declare(strict_types=1);

namespace CosmonovaRnD\CasparCG\OSC\Message\Channel;

/**
 * Class OutputPortFrame
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package CosmonovaRnD\CasparCG\OSC\Message\Channel
 * Cosmonova | Research & Development
 */
class OutputPortFrame extends OutputPort
{
    /** @var int */
    protected $currentFrames;
    /** @var  int */
    protected $maxFrames;

    public static $pattern = '#^/channel/(\d+)/output/port/(\d+)/frame\x00*$#';

    /**
     * @inheritDoc
     */
    public function __construct(int $channel, int $port, array $data)
    {
        $this->currentFrames = (int)$data[0] ?? 0;
        $this->maxFrames     = (int)$data[1] ?? 0;

        parent::__construct($channel, $port);
    }

    /**
     * Get current frames on port
     *
     * @return int
     */
    public function getCurrentFrames(): int
    {
        return $this->currentFrames;
    }

    /**
     * Get maximum frames on port
     *
     * @return int
     */
    public function getMaxFrames(): int
    {
        return $this->maxFrames;
    }
}
