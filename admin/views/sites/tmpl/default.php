<?php
defined('_JEXEC') or die;
?>

<form action="<?php echo JRoute::_('index.php?option=com_articlepush&view=sites'); ?>" 
      method="post" name="adminForm" id="adminForm">

    <table class="table table-striped" id="sitesList">
        <thead>
            <tr>
                <th width="1%">
                    <?php echo JHtml::_('grid.checkall'); ?>
                </th>
                <th width="1%">ID</th>
                <th>Site Name</th>
                <th>Site URL</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($this->items)) : ?>
                <?php foreach ($this->items as $i => $item) : ?>
                    <tr>
                        <td>
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td><?php echo (int) $item->id; ?></td>
                        <td><?php echo htmlspecialchars($item->site_name, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->api_url, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($item->api_username, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No sites found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div>
        <?php echo $this->pagination->getListFooter(); ?>
    </div>

    <input type="hidden" name="task" value="">
    <input type="hidden" name="boxchecked" value="0">
    <?php echo JHtml::_('form.token'); ?>
</form>
