<?php

namespace Dixmod\Builder;

use Dixmod\DTO\StatusDTO;
use Dixmod\Repository\Status\StatusRepository;
use Dixmod\Services\Task\Status;

class StatusBuilder
{
    /** @var  */
    private $statusRepository;

    public function __construct()
    {
        $this->statusRepository = new StatusRepository();
    }

    /**
     * @param int $id
     * @return Status
     */
    public function buildById(int $id): Status
    {
        $statusArray = $this->statusRepository->getById($id);

        $status = $this->build($statusArray);

        return $status;
    }

    public function build(array $statusArray): Status
    {
        $dto = $this->createStatusDTO($statusArray);
        $status = new Status($dto);

        return $status;
    }

    /**
     * @param array $status
     * @return StatusDTO
     */
    private function createStatusDTO(array $status): StatusDTO
    {
        $dto = new StatusDTO();
        $dto->id = $status['id'];
        $dto->name = $status['name'];
        $dto->description = $status['name'];

        return $dto;
    }
}