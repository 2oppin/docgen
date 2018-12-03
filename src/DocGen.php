<?php
namespace DocGen;

/**
 * Class DocGen
 *
 * @package docgen\src
 */
class DocGen
{
    protected $_dirScheme = [];

    /**
     * DocGen constructor.
     * @param DocGenConf $config
     */
    public function __construct(DocGenConf $config)
    {
        foreach ($config->dirs as $dir) {
            $this->_dirScheme[$dir] = $this->_scanDir($dir);
        }

        var_dump($this->_dirScheme);
    }

    /**
     * @param $dir
     * @return array
     */
    function _scanDir($dir) {
        $node = [];
        $tree = glob(rtrim($dir, '/') . '/*');
        if (is_array($tree)) {
            foreach($tree as $file) {
                if (is_dir($file)) {
                    $node[$file] = $this->_scanDir($file);
                } elseif (is_file($file)) {
                    $node[] = $file;
                }
            }
        }
        return $node;
    }
}