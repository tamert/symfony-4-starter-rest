<?php



declare(strict_types=1);

namespace App\Exception;

class FormInvalidException extends ApiException
{
    public const DEFAULT_MESSAGE = 'Submitted form did not pass validation.';

    /**
     * @param string $message
     * @param int $code
     * @param array $data
     */
    public function __construct(string $message, int $code, array $data = [])
    {
        parent::__construct($message, $code, $data);
    }
}
