<?php

namespace App\Exceptions;

use Exception;

class ExceptionHandler extends Exception
{
    protected $message;

    protected $statusCode;

    public function __construct($message, $statusCode)
    {
        $this->message = $message;
        if ($statusCode <= 0 || $statusCode > 500 || ctype_alnum($statusCode)) {
            $statusCode = 500;
        }
        $this->statusCode = $statusCode;
    }

    public function render()
    {
        return response()->json([
            'message' => $this->message,
            'success' => false,
        ], $this->statusCode);
    }
}
