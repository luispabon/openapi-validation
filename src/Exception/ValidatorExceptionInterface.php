<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\Exception;

use AuronConsulting\OpenApi\Validation\ErrorCollection;

/**
 * Tags our validation exceptions.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
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
