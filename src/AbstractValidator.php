<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\UriInterface;

/**
 * Contains common logic to the validators we include. You do not need to extend from here if you implement your own.
 *
 * @package AuronConsulting\OpenApi\Validator
 */
abstract class AbstractValidator
{
    /**
     * Validates
     *
     * @param MessageInterface $message
     * @param string           $headerName
     * @param array            $acceptedValues
     */
    protected function validateHeaders(MessageInterface $message, string $headerName, array $acceptedValues): void
    {

    }


    protected function validateRequestParameters(UriInterface $uri): void
    {

    }
}
