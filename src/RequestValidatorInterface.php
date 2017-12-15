<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Request validator interface.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
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
