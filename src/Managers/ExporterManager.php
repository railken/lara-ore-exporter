<?php

namespace Railken\Amethyst\Managers;

use Railken\Amethyst\Common\ConfigurableManager;
use Railken\Amethyst\Models\Exporter;
use Railken\Lem\Manager;

class ExporterManager extends Manager
{
    use ConfigurableManager;

    /**
     * @var string
     */
    protected $config = 'amethyst.exporter.data.exporter';

    /**
     * Request a exporter.
     *
     * @param Exporter $exporter
     * @param array    $data
     *
     * @return \Railken\Lem\Contracts\ResultContract
     */
    public function generate(Exporter $exporter, array $data = [])
    {
        $result = (new DataBuilderManager())->validateRaw($exporter->data_builder, $data);

        if (!$result->ok()) {
            return $result;
        }

        // We assume this class exists.
        $className = $exporter->class_name;

        if (!class_exists($className)) {
            throw new \Exception();
        }

        dispatch(new $className($exporter, $data, $this->getAgent()));

        return $result;
    }
}
