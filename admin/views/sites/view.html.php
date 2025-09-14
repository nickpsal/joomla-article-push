<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;

class ArticlepushViewSites extends BaseHtmlView
{
    protected $items;
    protected $pagination;

    public function display($tpl = null)
    {
        $this->items      = $this->get('Items');
        $this->pagination = $this->get('Pagination');

        $this->addToolbar();
        parent::display($tpl);
    }

    protected function addToolbar()
    {
        JToolbarHelper::title('Remote Sites', 'list');
        JToolbarHelper::addNew('site.add');
        JToolbarHelper::editList('site.edit');
        JToolbarHelper::deleteList('Are you sure?', 'sites.delete');
    }
}
