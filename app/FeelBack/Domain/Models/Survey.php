<?php


namespace Feelback\Domain\Models;


class Survey
{
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
     * @var EntityCollection
     */
    private $entities;

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
     * @return Survey
     */
    public function setCode(string $code): Survey
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
     * @return Survey
     */
    public function setName(string $name): Survey
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
     * @return Survey
     */
    public function setDescription(string $description): Survey
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return EntityCollection
     */
    public function getEntities(): EntityCollection
    {
        return $this->entities;
    }

    /**
     * @param EntityCollection $entities
     *
     * @return Survey
     */
    public function setEntities(EntityCollection $entities): Survey
    {
        $this->entities = $entities;

        return $this;
    }
}