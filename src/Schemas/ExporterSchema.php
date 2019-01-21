<?php

namespace Railken\Amethyst\Schemas;

use Railken\Amethyst\Contracts\GenerateExportContract;
use Railken\Amethyst\Managers\DataBuilderManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class ExporterSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('description'),
            Attributes\YamlAttribute::make('body')
                ->setRequired(true),
            Attributes\TextAttribute::make('filename')
                ->setRequired(true),
            Attributes\ClassNameAttribute::make('class_name', [GenerateExportContract::class])
                ->setRequired(true),
            Attributes\BelongsToAttribute::make('data_builder_id')
                ->setRelationName('data_builder')
                ->setRelationManager(DataBuilderManager::class)
                ->setRequired(true),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
