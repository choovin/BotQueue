<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Activities'), ['controller' => 'Activities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Activity'), ['controller' => 'Activities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bots'), ['controller' => 'Bots', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bot'), ['controller' => 'Bots', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Email Queue'), ['controller' => 'EmailQueue', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email Queue'), ['controller' => 'EmailQueue', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Error Log'), ['controller' => 'ErrorLog', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Error Log'), ['controller' => 'ErrorLog', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Clock'), ['controller' => 'JobClock', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Clock'), ['controller' => 'JobClock', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Oauth Consumer'), ['controller' => 'OauthConsumer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Oauth Consumer'), ['controller' => 'OauthConsumer', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Oauth Token'), ['controller' => 'OauthToken', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Oauth Token'), ['controller' => 'OauthToken', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Queues'), ['controller' => 'Queues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Queue'), ['controller' => 'Queues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List S3 Files'), ['controller' => 'S3Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New S3 File'), ['controller' => 'S3Files', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Slice Configs'), ['controller' => 'SliceConfigs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slice Config'), ['controller' => 'SliceConfigs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Slice Jobs'), ['controller' => 'SliceJobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Slice Job'), ['controller' => 'SliceJobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stats'), ['controller' => 'Stats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stat'), ['controller' => 'Stats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tokens'), ['controller' => 'Tokens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Token'), ['controller' => 'Tokens', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Webcam Images'), ['controller' => 'WebcamImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Webcam Image'), ['controller' => 'WebcamImages', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('username') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('pass_hash') ?></th>
            <th><?= $this->Paginator->sort('pass_reset_hash') ?></th>
            <th><?= $this->Paginator->sort('location') ?></th>
            <th><?= $this->Paginator->sort('birthday') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->pass_hash) ?></td>
            <td><?= h($user->pass_reset_hash) ?></td>
            <td><?= h($user->location) ?></td>
            <td><?= h($user->birthday) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
