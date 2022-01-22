<?php


/**
 * Under Construction  plugin for Craft CMS 3.x
 *
 * Under Construction
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\underconstruction\models;
use ds\underconstruction\Underconstruction;


use Craft;
use craft\base\Model;


/**
 *  Under Construction
 * 
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 
 */


class Settings extends Model
{
   // Public Properties
    // =========================================================================

    public $enabled = false;
    public $Facebook;
    


    public function getenable()
    {
        return Craft::parseEnv(trim(Underconstruction::getInstance()->getSettings()->enabled));

     
    }
   

    
    
}
