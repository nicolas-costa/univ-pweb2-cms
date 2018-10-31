<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PagesPhoto[]|\Cake\Collection\CollectionInterface $pagesPhotos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pages Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagesPhotos index large-9 medium-8 columns content">
    <h3><?= __('Pages Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagesPhotos as $pagesPhoto): ?>
            <tr>
                <td><?= $this->Number->format($pagesPhoto->id) ?></td>
                <td><?= $pagesPhoto->has('page') ? $this->Html->link($pagesPhoto->page->title, ['controller' => 'Pages', 'action' => 'view', $pagesPhoto->page->id]) : '' ?></td>
                <td><?= $pagesPhoto->has('photo') ? $this->Html->link($pagesPhoto->photo->id, ['controller' => 'Photos', 'action' => 'view', $pagesPhoto->photo->id]) : '' ?></td>
                <td><?= h($pagesPhoto->created_at) ?></td>
                <td><?= h($pagesPhoto->update_at) ?></td>
                <td><?= $this->Number->format($pagesPhoto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagesPhoto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagesPhoto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagesPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagesPhoto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
