<?php


/**
 * Under Construction plugin for Craft CMS 3.x
 *
 *  Under Construction
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2022 Dotsquares
 */

namespace ds\underconstruction\assetbundles;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;


class FrontEndAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    public function init()
    {
        $this->sourcePath = "@ds/underconstruction/resources/dist";

        $this->css = [
            'css/underconstruction.css',
        ];

        parent::init();
    }
}
