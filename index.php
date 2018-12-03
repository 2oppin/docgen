<?php
/**
 * Created by 2oppin
 * Date: 03.12.18
 * Time: 12:08
 */

use DocGen\DocGen;
use DocGen\DocGenConf;

$data = json_decode(file_get_contents('docgen.json'));
$dg = new DocGen(new DocGenConf((array) $data));

$dg->run();