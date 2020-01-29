<?php
declare(strict_types=1);

namespace Xtodx\CasparCG\Exception;

/**
 * Class ParseException
 *
 * @author  Aleksandr Besedin <bs@cosmonova.net>
 * @package Xtodx\CasparCG\Exception
 * Cosmonova | Research & Development
 */
class ParseException extends BaseException
{
    public function __construct($message, \Exception $previous = null)
    {
        $message = 'Parse error: ' . $message;

        parent::__construct($message, 400, $previous);
    }

}
