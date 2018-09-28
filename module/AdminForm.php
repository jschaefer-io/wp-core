<?php

namespace Core\Module;

use Core\Module;
use Core\RequireHandler;

class AdminForm extends Module{

    /**
     * Initializes the Theme Object
     */
    public function __construct(){
        parent::__construct('_CORE_FORM', -1);
    }

    /**
     * Initializes the Module
     */
    public function init(): void{
        $this->requireGroup();
    }

    /**
     * Builds up a RequireHandler for later usage within this Module
     * @param RequireHandler $handler A fresh RequireHandler to add files to
     * @return RequireHandler The combined RequireHandler
     */
    public function require(RequireHandler $handler): RequireHandler{
        $handler->addFile(\Core::$dir . '/admin/Form.php');
        $handler->addFile(\Core::$dir . '/admin/form/Element.php');
        $handler->addFile(\Core::$dir . '/admin/form/ParentElement.php');
        $handler->addFile(\Core::$dir . '/admin/form/Selectable.php');
        $handler->addFile(\Core::$dir . '/admin/form/*.php');
        return $handler;
    }

    /**
     * Includes the Module-Assets on the enqueue script-hook
     */
    public function enqueue(): void{
    }

    /**
     * Includes the Module-Assets on the adminenqueue script-hook
     */
    public function adminEnqueue(): void{
        if (!did_action('wp_enqueue_media')) {
            wp_enqueue_media();
        }
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_style('core-admin-form-css', \Core::pathToUrl(\Core::$dir) . '/admin/assets/form.css', [], '1.0', 'all');
        wp_enqueue_script('core-admin-form-logic-js', \Core::pathToUrl(\Core::$dir) . '/admin/assets/form-logic.js', ['jquery'], '1.0', false);
        wp_enqueue_script('core-admin-file-js', \Core::pathToUrl(\Core::$dir) . '/admin/assets/file.js', ['jquery'], '1.0', true);
    }
}