<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser;

/**
 * YAML spec loader - uses Symfony's YAML component
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class YamlLoader extends AbstractLoader
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @inheritdoc
     */
    protected function doLoad(string $contents): array
    {
        try {
            return $this->parser->parse($contents);
        } catch (ParseException $ex) {
            throw new Exception\InvalidFormatException('File was not in JSON format');
        }
    }
}
