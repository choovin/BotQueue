<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
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
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Username') ?></h6>
            <p><?= h($user->username) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
            <h6 class="subheader"><?= __('Pass Hash') ?></h6>
            <p><?= h($user->pass_hash) ?></p>
            <h6 class="subheader"><?= __('Pass Reset Hash') ?></h6>
            <p><?= h($user->pass_reset_hash) ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= h($user->location) ?></p>
            <h6 class="subheader"><?= __('Thingiverse Token') ?></h6>
            <p><?= h($user->thingiverse_token) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($user->id) ?></p>
            <h6 class="subheader"><?= __('Last Notification') ?></h6>
            <p><?= $this->Number->format($user->last_notification) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Birthday') ?></h6>
            <p><?= h($user->birthday) ?></p>
            <h6 class="subheader"><?= __('Last Active') ?></h6>
            <p><?= h($user->last_active) ?></p>
            <h6 class="subheader"><?= __('Registered On') ?></h6>
            <p><?= h($user->registered_on) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Is Admin') ?></h6>
            <p><?= $user->is_admin ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Dashboard Style') ?></h6>
            <?= $this->Text->autoParagraph(h($user->dashboard_style)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Activities') ?></h4>
    <?php if (!empty($user->activities)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Activity') ?></th>
            <th><?= __('Action Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->activities as $activities): ?>
        <tr>
            <td><?= h($activities->id) ?></td>
            <td><?= h($activities->user_id) ?></td>
            <td><?= h($activities->activity) ?></td>
            <td><?= h($activities->action_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Bots') ?></h4>
    <?php if (!empty($user->bots)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Oauth Token Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Client Name') ?></th>
            <th><?= __('Client Uid') ?></th>
            <th><?= __('Identifier') ?></th>
            <th><?= __('Model') ?></th>
            <th><?= __('Client Version') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Last Seen') ?></th>
            <th><?= __('Manufacturer') ?></th>
            <th><?= __('Electronics') ?></th>
            <th><?= __('Firmware') ?></th>
            <th><?= __('Extruder') ?></th>
            <th><?= __('Job Id') ?></th>
            <th><?= __('Error Text') ?></th>
            <th><?= __('Slice Config Id') ?></th>
            <th><?= __('Slice Engine Id') ?></th>
            <th><?= __('Temperature Data') ?></th>
            <th><?= __('Remote Ip') ?></th>
            <th><?= __('Local Ip') ?></th>
            <th><?= __('Driver Name') ?></th>
            <th><?= __('Driver Config') ?></th>
            <th><?= __('Webcam Image Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->bots as $bots): ?>
        <tr>
            <td><?= h($bots->id) ?></td>
            <td><?= h($bots->user_id) ?></td>
            <td><?= h($bots->oauth_token_id) ?></td>
            <td><?= h($bots->name) ?></td>
            <td><?= h($bots->client_name) ?></td>
            <td><?= h($bots->client_uid) ?></td>
            <td><?= h($bots->identifier) ?></td>
            <td><?= h($bots->model) ?></td>
            <td><?= h($bots->client_version) ?></td>
            <td><?= h($bots->status) ?></td>
            <td><?= h($bots->last_seen) ?></td>
            <td><?= h($bots->manufacturer) ?></td>
            <td><?= h($bots->electronics) ?></td>
            <td><?= h($bots->firmware) ?></td>
            <td><?= h($bots->extruder) ?></td>
            <td><?= h($bots->job_id) ?></td>
            <td><?= h($bots->error_text) ?></td>
            <td><?= h($bots->slice_config_id) ?></td>
            <td><?= h($bots->slice_engine_id) ?></td>
            <td><?= h($bots->temperature_data) ?></td>
            <td><?= h($bots->remote_ip) ?></td>
            <td><?= h($bots->local_ip) ?></td>
            <td><?= h($bots->driver_name) ?></td>
            <td><?= h($bots->driver_config) ?></td>
            <td><?= h($bots->webcam_image_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Bots', 'action' => 'view', $bots->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Bots', 'action' => 'edit', $bots->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bots', 'action' => 'delete', $bots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bots->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Comments') ?></h4>
    <?php if (!empty($user->comments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Content Id') ?></th>
            <th><?= __('Content Type') ?></th>
            <th><?= __('Comment') ?></th>
            <th><?= __('Comment Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->comments as $comments): ?>
        <tr>
            <td><?= h($comments->id) ?></td>
            <td><?= h($comments->user_id) ?></td>
            <td><?= h($comments->content_id) ?></td>
            <td><?= h($comments->content_type) ?></td>
            <td><?= h($comments->comment) ?></td>
            <td><?= h($comments->comment_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related EmailQueue') ?></h4>
    <?php if (!empty($user->email_queue)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Subject') ?></th>
            <th><?= __('Text Body') ?></th>
            <th><?= __('Html Body') ?></th>
            <th><?= __('To Email') ?></th>
            <th><?= __('To Name') ?></th>
            <th><?= __('Queue Date') ?></th>
            <th><?= __('Sent Date') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->email_queue as $emailQueue): ?>
        <tr>
            <td><?= h($emailQueue->id) ?></td>
            <td><?= h($emailQueue->user_id) ?></td>
            <td><?= h($emailQueue->subject) ?></td>
            <td><?= h($emailQueue->text_body) ?></td>
            <td><?= h($emailQueue->html_body) ?></td>
            <td><?= h($emailQueue->to_email) ?></td>
            <td><?= h($emailQueue->to_name) ?></td>
            <td><?= h($emailQueue->queue_date) ?></td>
            <td><?= h($emailQueue->sent_date) ?></td>
            <td><?= h($emailQueue->status) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'EmailQueue', 'action' => 'view', $emailQueue->]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'EmailQueue', 'action' => 'edit', $emailQueue->]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'EmailQueue', 'action' => 'delete', $emailQueue->], ['confirm' => __('Are you sure you want to delete # {0}?', $emailQueue->)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related ErrorLog') ?></h4>
    <?php if (!empty($user->error_log)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Job Id') ?></th>
            <th><?= __('Bot Id') ?></th>
            <th><?= __('Queue Id') ?></th>
            <th><?= __('Reason') ?></th>
            <th><?= __('Error Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->error_log as $errorLog): ?>
        <tr>
            <td><?= h($errorLog->id) ?></td>
            <td><?= h($errorLog->user_id) ?></td>
            <td><?= h($errorLog->job_id) ?></td>
            <td><?= h($errorLog->bot_id) ?></td>
            <td><?= h($errorLog->queue_id) ?></td>
            <td><?= h($errorLog->reason) ?></td>
            <td><?= h($errorLog->error_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'ErrorLog', 'action' => 'view', $errorLog->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'ErrorLog', 'action' => 'edit', $errorLog->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ErrorLog', 'action' => 'delete', $errorLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $errorLog->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related JobClock') ?></h4>
    <?php if (!empty($user->job_clock)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Job Id') ?></th>
            <th><?= __('Bot Id') ?></th>
            <th><?= __('Queue Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Created Time') ?></th>
            <th><?= __('Taken Time') ?></th>
            <th><?= __('Start Date') ?></th>
            <th><?= __('End Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->job_clock as $jobClock): ?>
        <tr>
            <td><?= h($jobClock->id) ?></td>
            <td><?= h($jobClock->job_id) ?></td>
            <td><?= h($jobClock->bot_id) ?></td>
            <td><?= h($jobClock->queue_id) ?></td>
            <td><?= h($jobClock->user_id) ?></td>
            <td><?= h($jobClock->status) ?></td>
            <td><?= h($jobClock->created_time) ?></td>
            <td><?= h($jobClock->taken_time) ?></td>
            <td><?= h($jobClock->start_date) ?></td>
            <td><?= h($jobClock->end_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'JobClock', 'action' => 'view', $jobClock->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'JobClock', 'action' => 'edit', $jobClock->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'JobClock', 'action' => 'delete', $jobClock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobClock->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Jobs') ?></h4>
    <?php if (!empty($user->jobs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Queue Id') ?></th>
            <th><?= __('Source File Id') ?></th>
            <th><?= __('File Id') ?></th>
            <th><?= __('Slice Job Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('User Sort') ?></th>
            <th><?= __('Bot Id') ?></th>
            <th><?= __('Progress') ?></th>
            <th><?= __('Temperature Data') ?></th>
            <th><?= __('Created Time') ?></th>
            <th><?= __('Taken Time') ?></th>
            <th><?= __('Downloaded Time') ?></th>
            <th><?= __('Finished Time') ?></th>
            <th><?= __('Slice Complete Time') ?></th>
            <th><?= __('Verified Time') ?></th>
            <th><?= __('Webcam Image Id') ?></th>
            <th><?= __('Webcam Images') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->jobs as $jobs): ?>
        <tr>
            <td><?= h($jobs->id) ?></td>
            <td><?= h($jobs->user_id) ?></td>
            <td><?= h($jobs->queue_id) ?></td>
            <td><?= h($jobs->source_file_id) ?></td>
            <td><?= h($jobs->file_id) ?></td>
            <td><?= h($jobs->slice_job_id) ?></td>
            <td><?= h($jobs->name) ?></td>
            <td><?= h($jobs->status) ?></td>
            <td><?= h($jobs->user_sort) ?></td>
            <td><?= h($jobs->bot_id) ?></td>
            <td><?= h($jobs->progress) ?></td>
            <td><?= h($jobs->temperature_data) ?></td>
            <td><?= h($jobs->created_time) ?></td>
            <td><?= h($jobs->taken_time) ?></td>
            <td><?= h($jobs->downloaded_time) ?></td>
            <td><?= h($jobs->finished_time) ?></td>
            <td><?= h($jobs->slice_complete_time) ?></td>
            <td><?= h($jobs->verified_time) ?></td>
            <td><?= h($jobs->webcam_image_id) ?></td>
            <td><?= h($jobs->webcam_images) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related OauthConsumer') ?></h4>
    <?php if (!empty($user->oauth_consumer)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Consumer Key') ?></th>
            <th><?= __('Consumer Secret') ?></th>
            <th><?= __('Active') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('App Url') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->oauth_consumer as $oauthConsumer): ?>
        <tr>
            <td><?= h($oauthConsumer->id) ?></td>
            <td><?= h($oauthConsumer->consumer_key) ?></td>
            <td><?= h($oauthConsumer->consumer_secret) ?></td>
            <td><?= h($oauthConsumer->active) ?></td>
            <td><?= h($oauthConsumer->name) ?></td>
            <td><?= h($oauthConsumer->user_id) ?></td>
            <td><?= h($oauthConsumer->app_url) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'OauthConsumer', 'action' => 'view', $oauthConsumer->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'OauthConsumer', 'action' => 'edit', $oauthConsumer->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OauthConsumer', 'action' => 'delete', $oauthConsumer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oauthConsumer->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related OauthToken') ?></h4>
    <?php if (!empty($user->oauth_token)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Consumer Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Ip Address') ?></th>
            <th><?= __('Token') ?></th>
            <th><?= __('Token Secret') ?></th>
            <th><?= __('Callback Url') ?></th>
            <th><?= __('Verifier') ?></th>
            <th><?= __('Device Data') ?></th>
            <th><?= __('Last Seen') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->oauth_token as $oauthToken): ?>
        <tr>
            <td><?= h($oauthToken->id) ?></td>
            <td><?= h($oauthToken->type) ?></td>
            <td><?= h($oauthToken->name) ?></td>
            <td><?= h($oauthToken->consumer_id) ?></td>
            <td><?= h($oauthToken->user_id) ?></td>
            <td><?= h($oauthToken->ip_address) ?></td>
            <td><?= h($oauthToken->token) ?></td>
            <td><?= h($oauthToken->token_secret) ?></td>
            <td><?= h($oauthToken->callback_url) ?></td>
            <td><?= h($oauthToken->verifier) ?></td>
            <td><?= h($oauthToken->device_data) ?></td>
            <td><?= h($oauthToken->last_seen) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'OauthToken', 'action' => 'view', $oauthToken->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'OauthToken', 'action' => 'edit', $oauthToken->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OauthToken', 'action' => 'delete', $oauthToken->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oauthToken->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Queues') ?></h4>
    <?php if (!empty($user->queues)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Delay') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->queues as $queues): ?>
        <tr>
            <td><?= h($queues->id) ?></td>
            <td><?= h($queues->user_id) ?></td>
            <td><?= h($queues->name) ?></td>
            <td><?= h($queues->delay) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Queues', 'action' => 'view', $queues->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Queues', 'action' => 'edit', $queues->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Queues', 'action' => 'delete', $queues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queues->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related S3Files') ?></h4>
    <?php if (!empty($user->s3_files)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Type') ?></th>
            <th><?= __('Size') ?></th>
            <th><?= __('Hash') ?></th>
            <th><?= __('Bucket') ?></th>
            <th><?= __('Path') ?></th>
            <th><?= __('Add Date') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Parent Id') ?></th>
            <th><?= __('Source Url') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->s3_files as $s3Files): ?>
        <tr>
            <td><?= h($s3Files->id) ?></td>
            <td><?= h($s3Files->type) ?></td>
            <td><?= h($s3Files->size) ?></td>
            <td><?= h($s3Files->hash) ?></td>
            <td><?= h($s3Files->bucket) ?></td>
            <td><?= h($s3Files->path) ?></td>
            <td><?= h($s3Files->add_date) ?></td>
            <td><?= h($s3Files->user_id) ?></td>
            <td><?= h($s3Files->parent_id) ?></td>
            <td><?= h($s3Files->source_url) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'S3Files', 'action' => 'view', $s3Files->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'S3Files', 'action' => 'edit', $s3Files->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'S3Files', 'action' => 'delete', $s3Files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $s3Files->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related SliceConfigs') ?></h4>
    <?php if (!empty($user->slice_configs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Fork Id') ?></th>
            <th><?= __('Engine Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Config Name') ?></th>
            <th><?= __('Config Data') ?></th>
            <th><?= __('Add Date') ?></th>
            <th><?= __('Edit Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->slice_configs as $sliceConfigs): ?>
        <tr>
            <td><?= h($sliceConfigs->id) ?></td>
            <td><?= h($sliceConfigs->fork_id) ?></td>
            <td><?= h($sliceConfigs->engine_id) ?></td>
            <td><?= h($sliceConfigs->user_id) ?></td>
            <td><?= h($sliceConfigs->config_name) ?></td>
            <td><?= h($sliceConfigs->config_data) ?></td>
            <td><?= h($sliceConfigs->add_date) ?></td>
            <td><?= h($sliceConfigs->edit_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'SliceConfigs', 'action' => 'view', $sliceConfigs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'SliceConfigs', 'action' => 'edit', $sliceConfigs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SliceConfigs', 'action' => 'delete', $sliceConfigs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sliceConfigs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related SliceJobs') ?></h4>
    <?php if (!empty($user->slice_jobs)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Job Id') ?></th>
            <th><?= __('Input Id') ?></th>
            <th><?= __('Output Id') ?></th>
            <th><?= __('Output Log') ?></th>
            <th><?= __('Error Log') ?></th>
            <th><?= __('Slice Config Id') ?></th>
            <th><?= __('Slice Config Snapshot') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Progress') ?></th>
            <th><?= __('Add Date') ?></th>
            <th><?= __('Taken Date') ?></th>
            <th><?= __('Finish Date') ?></th>
            <th><?= __('Uid') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->slice_jobs as $sliceJobs): ?>
        <tr>
            <td><?= h($sliceJobs->id) ?></td>
            <td><?= h($sliceJobs->user_id) ?></td>
            <td><?= h($sliceJobs->job_id) ?></td>
            <td><?= h($sliceJobs->input_id) ?></td>
            <td><?= h($sliceJobs->output_id) ?></td>
            <td><?= h($sliceJobs->output_log) ?></td>
            <td><?= h($sliceJobs->error_log) ?></td>
            <td><?= h($sliceJobs->slice_config_id) ?></td>
            <td><?= h($sliceJobs->slice_config_snapshot) ?></td>
            <td><?= h($sliceJobs->status) ?></td>
            <td><?= h($sliceJobs->progress) ?></td>
            <td><?= h($sliceJobs->add_date) ?></td>
            <td><?= h($sliceJobs->taken_date) ?></td>
            <td><?= h($sliceJobs->finish_date) ?></td>
            <td><?= h($sliceJobs->uid) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'SliceJobs', 'action' => 'view', $sliceJobs->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'SliceJobs', 'action' => 'edit', $sliceJobs->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SliceJobs', 'action' => 'delete', $sliceJobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sliceJobs->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Stats') ?></h4>
    <?php if (!empty($user->stats)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Seconds') ?></th>
            <th><?= __('Bot Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Status') ?></th>
            <th><?= __('Start Date') ?></th>
            <th><?= __('End Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->stats as $stats): ?>
        <tr>
            <td><?= h($stats->seconds) ?></td>
            <td><?= h($stats->bot_id) ?></td>
            <td><?= h($stats->user_id) ?></td>
            <td><?= h($stats->status) ?></td>
            <td><?= h($stats->start_date) ?></td>
            <td><?= h($stats->end_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Stats', 'action' => 'view', $stats->]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Stats', 'action' => 'edit', $stats->]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stats', 'action' => 'delete', $stats->], ['confirm' => __('Are you sure you want to delete # {0}?', $stats->)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Tokens') ?></h4>
    <?php if (!empty($user->tokens)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Hash') ?></th>
            <th><?= __('Expire Date') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->tokens as $tokens): ?>
        <tr>
            <td><?= h($tokens->id) ?></td>
            <td><?= h($tokens->user_id) ?></td>
            <td><?= h($tokens->hash) ?></td>
            <td><?= h($tokens->expire_date) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Tokens', 'action' => 'view', $tokens->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Tokens', 'action' => 'edit', $tokens->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tokens', 'action' => 'delete', $tokens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tokens->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related WebcamImages') ?></h4>
    <?php if (!empty($user->webcam_images)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Timestamp') ?></th>
            <th><?= __('Image Id') ?></th>
            <th><?= __('User Id') ?></th>
            <th><?= __('Bot Id') ?></th>
            <th><?= __('Job Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($user->webcam_images as $webcamImages): ?>
        <tr>
            <td><?= h($webcamImages->timestamp) ?></td>
            <td><?= h($webcamImages->image_id) ?></td>
            <td><?= h($webcamImages->user_id) ?></td>
            <td><?= h($webcamImages->bot_id) ?></td>
            <td><?= h($webcamImages->job_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'WebcamImages', 'action' => 'view', $webcamImages->timestamp]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'WebcamImages', 'action' => 'edit', $webcamImages->timestamp]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'WebcamImages', 'action' => 'delete', $webcamImages->timestamp], ['confirm' => __('Are you sure you want to delete # {0}?', $webcamImages->timestamp)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
