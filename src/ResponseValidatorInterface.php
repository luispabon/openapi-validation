<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation;

use Psr\Http\Message\ResponseInterface;

/**
 * Response validator interface.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
interface ResponseValidatorInterface
{
    /**
     * Response validator. Must throw exceptions below if validation fails.
     *
     * @param ResponseInterface $response
     * @param SpecInterface     $schema
     *
     * @throws Exception\ValidatorExceptionInterface
     */
    public function validateResponse(ResponseInterface $response, SpecInterface $schema): void;
}
