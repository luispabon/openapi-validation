<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

/**
 * Describes a validation error.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class Error
{
    /**
     * String identifier for this particular error.
     *
     * @var string
     */
    private $code;

    /**
     * A description of the error.
     *
     * @var string
     */
    private $message;

    /**
     * The parameter name (where applicable) where the error happened.
     *
     * @var string|null
     */
    private $parameterName;

    /**
     * A pointer (eg jsonpath) to where the error happened.
     *
     * @var string|null
     */
    private $pointer;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Error
     */
    public function setCode(string $code): Error
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     *
     * @return Error
     */
    public function setMessage(string $message): Error
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getParameterName(): ?string
    {
        return $this->parameterName;
    }

    /**
     * @param null|string $parameterName
     *
     * @return Error
     */
    public function setParameterName(?string $parameterName): Error
    {
        $this->parameterName = $parameterName;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPointer(): ?string
    {
        return $this->pointer;
    }

    /**
     * @param null|string $pointer
     *
     * @return Error
     */
    public function setPointer(?string $pointer): Error
    {
        $this->pointer = $pointer;

        return $this;
    }
}
