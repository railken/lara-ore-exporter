<?php

namespace Railken\LaraOre\Exporter\Attributes\RepositoryId\Exceptions;

use Railken\LaraOre\Exporter\Exceptions\ExporterAttributeException;

class ExporterRepositoryIdNotDefinedException extends ExporterAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'repository_id';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'REPORT_REPOSITORY_ID_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}