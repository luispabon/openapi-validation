<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation;

use JsonSchema\Validator as JsonSchemaValidator;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidator;

/**
 * Contains common logic to the validators we include. You do not need to extend from here if you implement your own.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
abstract class AbstractValidator
{
    /**
     * @var JsonSchemaValidator
     */
    private $jsonSchemaValidator;

    /**
     * @var SymfonyValidator
     */
    private $symfonyValidator;

    public function __construct(JsonSchemaValidator $jsonSchemaValidator, SymfonyValidator $validator)
    {
        $this->jsonSchemaValidator = $jsonSchemaValidator;
        $this->symfonyValidator    = $validator;
    }

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

    protected function validateBody(StreamInterface $body, BodySpec $spec): void
    {

    }
}
