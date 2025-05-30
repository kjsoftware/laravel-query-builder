<?php

namespace Spatie\QueryBuilder;

use Illuminate\Support\Collection;

class AllowedField
{
    protected string $name;
    protected Collection $internalNames;

    public function __construct(string $name, string|array $internalName = null)
    {
        $this->name = $name;

        $this->internalNames = collect($internalName);
    }


    public static function setFilterArrayValueDelimiter(string $delimiter = null): void
    {
        if (isset($delimiter)) {
            QueryBuilderRequest::setFilterArrayValueDelimiter($delimiter);
        }
    }

    public static function partial(string $name, $internalNames = null, bool $addRelationConstraint = true, string $arrayValueDelimiter = null): self
    {
        static::setFilterArrayValueDelimiter($arrayValueDelimiter);

        return new static($name, $internalNames);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInternalNames(): Collection
    {
        return $this->internalNames;
    }
}
