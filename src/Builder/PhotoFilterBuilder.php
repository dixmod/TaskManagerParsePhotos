<?php

namespace Dixmod\Builder;

use Dixmod\DTO\PhotoFilterDTO;
use Dixmod\Repository\Task\Type\Photo\PhotoFilterRepository;
use Dixmod\Services\PhotoFilter\PhotoFilter;

class PhotoFilterBuilder
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PhotoFilterRepository();
    }

    /**
     * @param int $id
     * @return PhotoFilter
     */
    public function buildById(int $id): PhotoFilter
    {
        $data = $this->repository->getById($id);

        return $this->build($data);
    }


    /**
     * @param array $data
     * @return PhotoFilter
     */
    public function build(array $data): PhotoFilter
    {
        return new PhotoFilter($this->createDTO($data));
    }

    /**
     * @param array $data
     * @return PhotoFilterDTO
     */
    private function createDTO(array $data): PhotoFilterDTO
    {
        $dto = new PhotoFilterDTO();
        $dto->id = $data['id'];
        $dto->name = $data['name'];
        $dto->description = $data['description'];
        $dto->code = $data['code'];

        return $dto;
    }
}