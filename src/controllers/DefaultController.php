<?php

/**
 * Under Construction plugin for Craft CMS 3.x
 *
 *  Under Construction
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2022 Dotsquares
 */

namespace ds\underconstruction\controllers;

use Craft;
use craft\web\View;
use craft\web\Controller;
use ds\underconstruction\Underconstruction;


class DefaultController extends Controller
{
    // Properties
    // =========================================================================

    protected $allowAnonymous = true;

    
    // Public Methods
    // =========================================================================

    public function actionUnderconstruction()
    {
        $oldMode = \Craft::$app->view->getTemplateMode();
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
        $html = \Craft::$app->view->renderTemplate('underconstruction/underconstruction.twig');
        Craft::$app->view->setTemplateMode($oldMode);
        return $this->renderTemplate('underconstruction/underconstruction.twig', [], View::TEMPLATE_MODE_CP);

    }

    

    
}