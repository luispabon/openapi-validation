<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Request validator interface.
 *
 * @package AuronConsulting\OpenApi\Validator
 */
interface RequestValidatorInterface
{
    /**
     * Validates an incoming request against the specified schema.
     *
     * @param ServerRequestInterface $request
     * @param SpecInterface          $spec
     *
     * @throws Exception\ValidatorExceptionInterface
     */
    public function validateRequest(ServerRequestInterface $request, SpecInterface $spec): void;
}
