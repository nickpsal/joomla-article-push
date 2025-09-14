<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class ArticlepushModelSites extends ListModel
{
    protected function getListQuery()
    {
        $db    = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
              ->from($db->quoteName('#__articlepush_sites'));

        return $query;
    }
}
