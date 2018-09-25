<?php

namespace Dixmod\Services\Task\Type\Photo;

use Dixmod\Application\Config;
use Dixmod\Repository\Task\Type\Photo\SendRepository;
use Dixmod\Services\Task\TaskInterface;
use Dixmod\Services\Task\Type;
use PHPMailer\PHPMailer\PHPMailer;


class Send extends Type implements TaskInterface
{
    /** @var SendRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = new SendRepository;
    }

    public function run()
    {
        $mail = new PHPMailer(true);
        try {
            $mail->setFrom('test@test.ru', 'test');
            $mail->addAddress($this->params['email']);

            $mail->addAttachment($this->getFileName());

            $mail->isHTML(true);
            $mail->Subject = 'Result parsing photo '.$this->params['photo'];
            $mail->Body = 'Hi';

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    /**
     * @return string
     */
    private function getFileName(): string
    {
        return Config::getOptions('tmp')['dir'] . '/' . $this->params['photo'];
    }
}