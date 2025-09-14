<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\AdminController;

class ArticlepushControllerSites extends AdminController
{
    public function getModel($name = 'Site', $prefix = 'ArticlepushModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}
