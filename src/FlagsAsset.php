<?php /** @noinspection PhpMissingFieldTypeInspection */
declare(strict_types=1);

namespace sablesoft\flags;

use yii\web\AssetBundle;

/**
 * Class FlagIconAsset
 * @package sablesoft\flags
 */
class FlagsAsset extends AssetBundle
{
    const PUBLISH_PATTERN = "/\/css|\/flags/";

    const CSS_FILE = 'css/flag-icon.css';
    const CSS_MIN_FILE = 'css/flag-icon.min.css';

    public $sourcePath = '@bower/flag-icon-css';

    public function init()
    {
        $this->css = (YII_ENV === 'dev') ? [static::CSS_FILE] : [static::CSS_MIN_FILE];
        parent::init();
        $this->publishOptions = [
            'beforeCopy' => function ($from, $to) {
                return preg_match(static::PUBLISH_PATTERN, $from);
            }
        ];
    }
}
