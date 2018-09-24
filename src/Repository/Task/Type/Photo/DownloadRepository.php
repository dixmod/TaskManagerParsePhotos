<?php

namespace Dixmod\Repository\Task\Type\Photo;

use Dixmod\Repository\{
    AbstractRepository,
    RepositoryInterface
};

class DownloadRepository extends AbstractRepository implements RepositoryInterface{
    protected $table = 'typeTaskPhotoDownload';
}