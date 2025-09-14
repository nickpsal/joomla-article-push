<?php defined('_JEXEC') or die; ?>

<form action="<?php echo JRoute::_('index.php?option=com_articlepush&view=articles'); ?>"
      method="post" name="adminForm" id="adminForm">

    <h1>Articles</h1>

    <?php if (!empty($this->items)) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->items as $item): ?>
                    <tr>
                        <td><?php echo $this->escape($item->title); ?></td>
                        <td><?php echo $item->created; ?></td>
                        <td><?php echo ((int)$item->state === 1) ? 'Published' : 'Unpublished'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- ΑΝΤΙ για getListFooter() (που βγάζει JS onclick), βγάλε καθαρά links -->
        <div class="pagination">
            <?php echo $this->pagination->getPagesLinks(); ?>
        </div>
        <!-- Αν θες και το "Display #": -->

    <?php else : ?>
        <p>No articles found.</p>
    <?php endif; ?>

    <input type="hidden" name="task" value="">
    <input type="hidden" name="boxchecked" value="0">
    <input type="hidden" name="limitstart" value="<?php echo (int) $this->pagination->limitstart; ?>">
    <?php echo JHtml::_('form.token'); ?>
</form>
