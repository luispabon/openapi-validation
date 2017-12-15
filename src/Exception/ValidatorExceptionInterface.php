<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator\Exception;

use AuronConsulting\OpenApi\Validator\ErrorCollection;

/**
 * Tags our validation exceptions.
 *
 * @package AuronConsulting\OpenApi\Validator\Exception
 */
interface ValidatorExceptionInterface
{
    /**
     * Must return all the errors as a list.
     *
     * @return ErrorCollection
     */
    public function getErrors(): ErrorCollection;
}
