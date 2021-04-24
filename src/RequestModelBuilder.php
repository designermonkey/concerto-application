<?php declare(strict_types=1);

namespace Jorpo\Concerto\Application;

/**
 * @template TModel of Model
 */
abstract class RequestModelBuilder
{
    private array $parameters;

    private Issues $issues;

    public function __construct()
    {
        $this->parameters = [];
        $this->issues = new Issues();
    }

    final public function withParameters(array $parameters): RequestModelBuilder
    {
        $this->parameters = array_replace_recursive($this->parameters, $parameters);

        return $this;
    }

    /**
     * @return TModel
     * @throws Issues
     */
    final public function build(): Model
    {
        $this->issues = $this->testForRequiredParameters(
            $this->parameters,
            $this->issues
        );

        if (0 !== count($this->issues)) {
            throw $this->issues;
        }

        return $this->buildModel($this->parameters);
    }

    abstract protected function testForRequiredParameters(array $parameters, Issues $issues): Issues;

    /**
     * @return TModel
     */
    abstract protected function buildModel(array $parameters): Model;
}
