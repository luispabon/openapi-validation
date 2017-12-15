<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

use AuronConsulting\OpenApi\Schema\SchemaInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Response validator interface.
 *
 * @package AuronConsulting\OpenApi\Validator
 */
interface ResponseValidatorInterface
{
    /**
     * Response validator. Must throw exceptions below if validation fails.
     *
     * @param ResponseInterface $response
     * @param SchemaInterface   $schema
     *
     * @throws Exception\ValidatorExceptionInterface
     */
    public function validateResponse(ResponseInterface $response, SchemaInterface $schema): void;
}
