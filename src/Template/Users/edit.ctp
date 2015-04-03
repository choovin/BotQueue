<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
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
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('pass_hash');
            echo $this->Form->input('pass_reset_hash');
            echo $this->Form->input('location');
            echo $this->Form->input('birthday');
            echo $this->Form->input('last_active');
            echo $this->Form->input('registered_on');
            echo $this->Form->input('last_notification');
            echo $this->Form->input('dashboard_style');
            echo $this->Form->input('thingiverse_token');
            echo $this->Form->input('is_admin');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
