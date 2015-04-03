<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * App View class
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * For e.g. use this method to load a helper for all views:
     * `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->Html->css("/bootstrap/2.3.0/css/bootstrap.min.css", ['block' => true]);
        $this->Html->css("/bootstrap/2.3.0/css/bootstrap-responsive.min.css", ['block' => true]);
        $this->Html->css("/css/botqueue.css", ['block' => true]);

        $this->Html->script("/js/jquery-1.11.0.min.js");
        $this->Html->script("/js/jquery-ui-1.10.3/ui/minified/jquery-ui.min.js");
        $this->Html->script("/js/jquery.imagesloaded.min.js");
        $this->Html->script("/js/flot-0.7/jquery.flot.js");
        $this->Html->script("/js/flot-0.7/jquery.flot.selection.js");
        $this->Html->script("/js/jquery.flot.tooltip.min.js");

        $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore.js");
        $this->Html->script("https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.1.2/backbone-min.js");
    }
}
