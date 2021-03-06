<?php

namespace Dixmod\Services\Task\Type\Photo;

use Dixmod\Application\Config;
use Dixmod\Repository\Task\Type\Photo\DownloadRepository;
use Dixmod\Services\Task\TaskInterface;
use Dixmod\Services\Task\Type;

class Download extends Type implements TaskInterface
{
    /** @var DownloadRepository  */
    protected $repository;

    protected $tmpDirectory = 'tmp';

    public function __construct()
    {
        $this->repository = new DownloadRepository;
    }

    /**
     * @return bool|int
     */
    public function run()
    {
        // TODO: переделать на guzzle
        return file_put_contents(
            $this->getResultFileName(),
            file_get_contents(
                $this->params['url']
            )
        );
    }

    private function getResultFileName(): string
    {
        return Config::getOptions('tmp')['dir'].'/'.$this->params['photo'];
    }
}
