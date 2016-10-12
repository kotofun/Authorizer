<?php

namespace App\Exceptions;

/**
 * Class InvalidTokenException.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class InvalidTokenException extends \RuntimeException
{
    public function __construct($message = 'JWT is invalid!', $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
