<?php
defined('_JEXEC') or die;

class ArticlepushModelArticles extends JModelList
{
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();

        // Πόσα ανά σελίδα
        $limit = $app->getUserStateFromRequest(
            $this->context . '.list.limit',
            'limit',
            $app->getCfg('list_limit', 20),
            'uint'
        );
        $this->setState('list.limit', $limit);

        // Από πού ξεκινάμε (offset)
        $limitstart = $app->input->get('limitstart', 0, 'uint'); // διαβάζει GET/POST
        // Αν άλλαξε το limit, ευθυγράμμισε το limitstart
        $limitstart = ($limit > 0) ? (floor($limitstart / $limit) * $limit) : 0;
        $this->setState('list.start', $limitstart);

        parent::populateState($ordering, $direction);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $q  = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__content'))
            ->order($db->quoteName('created') . ' DESC');

        return $q;
    }
}
