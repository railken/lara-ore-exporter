<?php

namespace Railken\LaraOre\Exporter\Attributes\UpdatedAt\Exceptions;

use Railken\LaraOre\Exporter\Exceptions\ExporterAttributeException;

class ExporterUpdatedAtNotDefinedException extends ExporterAttributeException
{
    /**
     * The reason (attribute) for which this exception is thrown.
     *
     * @var string
     */
    protected $attribute = 'updated_at';

    /**
     * The code to identify the error.
     *
     * @var string
     */
    protected $code = 'REPORT_UPDATED_AT_NOT_DEFINED';

    /**
     * The message.
     *
     * @var string
     */
    protected $message = 'The %s is required';
}