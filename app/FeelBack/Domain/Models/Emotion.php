<?php

namespace App\Feelback\Domain\Models;

/**
 * Class Emotion
 * @package Feelback\Domain\Models
 */
class Emotion
{
    const INTENSITY_MILD    = -1;
    const INTENSITY_BASIC   = 0;
    const INTENSITY_INTENSE = 1;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * Can be mild, basic or intense
     * @var int
     */
    private $intensity;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Emotion
     */
    public function setCode(string $code): Emotion
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Emotion
     */
    public function setName(string $name): Emotion
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Emotion
     */
    public function setDescription(string $description): Emotion
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * @param int $intensity
     *
     * @return Emotion
     */
    public function setIntensity(int $intensity): Emotion
    {
        $this->intensity = $intensity;

        return $this;
    }
}
