<?php


/**
 * Under Construction plugin for Craft CMS 3.x
 *
 *  Under Construction
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2022 Dotsquares
 */

namespace ds\underconstruction;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use ds\underconstruction\models\Settings;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;
use craft\web\View;
use craft\helpers\UrlHelper;




class  Underconstruction extends Plugin 

{
    public $hasCpSettings = true;
	public static $plugin;
    
    // Public Methods
    // =========================================================================

    public function init()
    {

        parent::init();
         self::$plugin = $this;
         $this->_testing();

         Event::on(
            \craft\web\UrlManager::class,
            \craft\web\UrlManager::EVENT_REGISTER_SITE_URL_RULES,
            function(\craft\events\RegisterUrlRulesEvent $event) {
                $event->rules['underconstruction'] = 'underconstruction/default/underconstruction';
            }
         );
        

        Craft::info(
            Craft::t(
                'underconstruction',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
     // Protected Methods
    // =========================================================================
    protected function createSettingsModel()
    {
        return new Settings();
    }


        // Get the settings that are being defined by template

    protected function settingsHtml()
    {
        return \Craft::$app->getView()->renderTemplate(
            // Plugin handle name/settings
            'underconstruction/settings',
            [ 'settings' => $this->getSettings() ]
        );

    } 
    private function _testing()
    {
    
        Event::on(Plugins::class, Plugins::EVENT_AFTER_LOAD_PLUGINS, function(Event $event) {
            $request = Craft::$app->getRequest();
            $settings = Underconstruction::$plugin->getSettings();

            if (
                // Is the plugin enabled
                $settings->getenable() &&
                // Is the user a guest
                Craft::$app->user->getIsGuest() &&
                // Only care about site request
                $request->getIsSiteRequest() &&
                // Only redirect if you are not already there
                $request->getSegment(1) != 'underconstruction'
            ) {
                Craft::$app->getResponse()->redirect('underconstruction');
                Craft::$app->end();
            }
          
            
            

           

    });

    


     
    



}
}


