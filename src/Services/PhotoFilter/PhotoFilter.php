<?php

namespace Dixmod\Services\PhotoFilter;

use Dixmod\DTO\PhotoFilterDTO;

class PhotoFilter extends PhotoFilterDTO implements PhotoFilterInterface
{

    /**
     * PhotoFilter constructor.
     * @param PhotoFilterDTO $DTO
     */
    public function __construct(PhotoFilterDTO $DTO)
    {
        $this->id = $DTO->id;
        $this->name = $DTO->name;
        $this->description = $DTO->description;
        $this->code = $DTO->code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}