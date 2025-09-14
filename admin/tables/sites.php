<?php
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class ArticlepushTableSites extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__articlepush_sites', 'id', $db);
    }
}
