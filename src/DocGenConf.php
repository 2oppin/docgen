<?php
namespace DocGen;

/**
 * Class DocGenConf
 *
 * @property array $dirs
 * @property string $output
 *
 * @package docgen\core
 */
class DocGenConf
{
    protected $_dirs = ["src"];
    protected $_output = "doc";

    /**
     * DocGenConf constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->_parseData($data);
    }

    /**
     * @param array $data
     */
    protected function _parseData(array $data)
    {
        foreach ($data as $key => $val) {
            if ($this->{"_$key"} ?? 0)
                $this->{"_$key"} = $val;
        }
    }

    /**
     * @param $name
     * @return mixed
     * @throws DocGenException
     */
    public function __get($name)
    {
        if ($this->{"_$name"} ?? 0)
            return $this->{"_$name"};
        else
            throw new DocGenException("Unknown Config Param \"$name\".");
    }
}