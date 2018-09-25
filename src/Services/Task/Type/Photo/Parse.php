<?php

namespace Dixmod\Services\Task\Type\Photo;

use Dixmod\{Application\Config,
    Builder\PhotoFilterBuilder,
    File\Photo,
    Repository\Task\Type\Photo\ParseRepository,
    Services\PhotoFilter\PhotoFilter,
    Services\Task\TaskInterface,
    Services\Task\Type};

class Parse extends Type implements TaskInterface
{
    /** @var ParseRepository */
    protected $repository;


    /** @var */
    private $photoFilterBuilder;

    /**
     * Parse constructor.
     */
    public function __construct()
    {
        $this->repository = new ParseRepository;
        $this->photoFilterBuilder = new PhotoFilterBuilder();
    }

    public function run()
    {
        $photo = new Photo($this->getFileName());
        $photo->setFilter( $this->getFilter()->getCode() );
        $photo->save($this->getFileName());
    }

    /**
     * @return PhotoFilter
     */
    private function getFilter(): PhotoFilter
    {
        return $this->photoFilterBuilder->buildById($this->params['filter']);
    }

    /**
     * @return string
     */
    private function getFileName(): string
    {
        return Config::getOptions('tmp')['dir'].'/'.$this->params['photo'];
    }
}