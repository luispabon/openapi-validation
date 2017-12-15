<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator\OpenApi2;

use AuronConsulting\OpenApi\Validator\AbstractValidator;
use AuronConsulting\OpenApi\Validator\RequestValidatorInterface;
use AuronConsulting\OpenApi\Validator\ResponseValidatorInterface;
use AuronConsulting\OpenApi\Validator\SpecInterface;
use JsonSchema\Validator as JsonSchemaValidator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * OpenApi v2 (Swagger) validator implemented with Justin Rainbow JSON Schema's lib.
 *
 * @package AuronConsulting\OpenApi\Validator\OpenApi2
 */
class JustinRainbowValidator extends AbstractValidator implements RequestValidatorInterface, ResponseValidatorInterface
{
    /**
     * @var JsonSchemaValidator
     */
    private $jsonSchemaValidator;

    public function __construct(JsonSchemaValidator $jsonSchemaValidator)
    {
        $this->jsonSchemaValidator = $jsonSchemaValidator;
    }

    /**
     * @inheritdoc
     */
    public function validateRequest(ServerRequestInterface $request, SpecInterface $spec): void
    {
        // TODO: Implement validateRequest() method.
    }

    /**
     * @inheritdoc
     */
    public function validateResponse(ResponseInterface $response, SpecInterface $schema): void
    {
        // TODO: Implement validateResponse() method.
    }
}
