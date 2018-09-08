<?php

namespace App\Feelback\Domain\Models;

/**
 * Class Entity
 * @package Feelback\Domain\Models
 */
class Entity
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $image;

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
     * @return Entity
     */
    public function setCode(string $code): Entity
    {
        $this->code = $code;

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
     * @return Entity
     */
    public function setDescription(string $description): Entity
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return Entity
     */
    public function setTitle(string $title): Entity
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return Entity
     */
    public function setImage(string $image): Entity
    {
        $this->image = $image;

        return $this;
    }
}
