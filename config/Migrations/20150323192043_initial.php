<?php
use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        if (!$this->hasTable('users')) {
            $table
                ->addColumn('username', 'string', [
                    'default' => null,
                    'limit' => 32,
                    'null' => false,
                ])
                ->addColumn('email', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('pass_hash', 'string', [
                    'default' => null,
                    'limit' => 40,
                    'null' => false,
                ])
                ->addColumn('pass_reset_hash', 'string', [
                    'default' => null,
                    'limit' => 40,
                    'null' => false,
                ])
                ->addColumn('location', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('birthday', 'date', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('last_active', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('registered_on', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('last_notification', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('dashboard_style', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('thingiverse_token', 'string', [
                    'default' => null,
                    'limit' => 40,
                    'null' => false,
                ])
                ->addColumn('is_admin', 'boolean', [
                    'default' => 0,
                    'limit' => null,
                    'null' => false,
                ]);
            $table->create();
        }

        $table = $this->table('activities');
        if (!$this->hasTable('activities')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('activity', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('action_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('bot_queues', ['id' => false, 'primary_key' => ['queue_id', 'bot_id', 'priority']]);
        if (!$this->hasTable('bot_queues')) {
            $table
                ->addColumn('queue_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('bot_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('priority', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('bots');
        if (!$this->hasTable('bots')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('oauth_token_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('client_name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('client_uid', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('identifier', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('model', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('client_version', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('status', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('last_seen', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('manufacturer', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('electronics', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('firmware', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('extruder', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('job_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('error_text', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('slice_config_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('slice_engine_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('temperature_data', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('remote_ip', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('local_ip', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('driver_name', 'string', [
                    'default' => 'printcore',
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('driver_config', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('webcam_image_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('comments');
        if (!$this->hasTable('comments')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('content_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('content_type', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('comment', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('comment_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('email_queue');
        if (!$this->hasTable('email_queue')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('subject', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('text_body', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('html_body', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('to_email', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('to_name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('queue_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('sent_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('status', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('engine_os', ['id' => false, 'primary_key' => ['engine_id', 'os']]);
        if (!$this->hasTable('engine_os')) {
            $table
                ->addColumn('engine_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('os', 'string', [
                    'default' => null,
                    'limit' => 20,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('error_log');
        if (!$this->hasTable('error_log')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('job_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('bot_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('queue_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('reason', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('error_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('job_clock');
        if (!$this->hasTable('job_clock')) {
            $table
                ->addColumn('job_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('bot_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('queue_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('status', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('created_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('taken_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('start_date', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('end_date', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('jobs');
        if (!$this->hasTable('jobs')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('queue_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('source_file_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('file_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('slice_job_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('status', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('user_sort', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('bot_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('progress', 'float', [
                    'default' => 0,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('temperature_data', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('created_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('taken_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('downloaded_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('finished_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('slice_complete_time', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('verified_time', 'datetime', [
                    'default' => '0000-00-00 00:00:00',
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('webcam_image_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('webcam_images', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('notifications');
        if (!$this->hasTable('notifications')) {
            $table
                ->addColumn('timestamp', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('from_user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('to_user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('title', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('content', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('oauth_consumer');
        if (!$this->hasTable('oauth_consumer')) {
            $table
                ->addColumn('consumer_key', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('consumer_secret', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('active', 'boolean', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => true,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('app_url', 'string', [
                    'default' => '',
                    'limit' => 255,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('oauth_consumer_nonce');
        if (!$this->hasTable('oauth_consumer_nonce')) {
            $table
                ->addColumn('consumer_id', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('timestamp', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('nonce', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => true,
                ])
                ->create();
        }

        $table = $this->table('oauth_token');
        if (!$this->hasTable('oauth_token')) {
            $table
                ->addColumn('type', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('name', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('consumer_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('ip_address', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('token', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('token_secret', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('callback_url', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('verifier', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('device_data', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('last_seen', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('patches');
        if (!$this->hasTable('patches')) {
            $table
                ->addColumn('patch_num', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('description', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('queues');
        if (!$this->hasTable('queues')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('delay', 'integer', [
                    'default' => 0,
                    'limit' => 11,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('s3_files', ['id' => false, 'primary_key' => ['id']]);
        if (!$this->hasTable('s3_files')) {
            $table
                ->addColumn('id', 'biginteger', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('type', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('size', 'integer', [
                    'default' => null,
                    'limit' => 10,
                    'null' => false,
                ])
                ->addColumn('hash', 'string', [
                    'default' => null,
                    'limit' => 32,
                    'null' => false,
                ])
                ->addColumn('bucket', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('path', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('add_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('parent_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('source_url', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->create();
        }

        $table = $this->table('shortcodes');
        if (!$this->hasTable('shortcodes')) {
            $table
                ->addColumn('url', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('slice_configs');
        if (!$this->hasTable('slice_configs')) {
            $table
                ->addColumn('fork_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('engine_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('config_name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('config_data', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('add_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('edit_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('slice_engines');
        if (!$this->hasTable('slice_engines')) {
            $table
                ->addColumn('engine_name', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('engine_path', 'string', [
                    'default' => null,
                    'limit' => 255,
                    'null' => false,
                ])
                ->addColumn('is_featured', 'boolean', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('is_public', 'boolean', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('add_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('default_config_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('slice_jobs');
        if (!$this->hasTable('slice_jobs')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('job_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('input_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('output_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('output_log', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('error_log', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('slice_config_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('slice_config_snapshot', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('status', 'text', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->addColumn('progress', 'float', [
                    'default' => 0,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('add_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('taken_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('finish_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('uid', 'string', [
                    'default' => null,
                    'limit' => 40,
                    'null' => false,
                ])
                ->create();
        }

        $table = $this->table('tokens');
        if (!$this->hasTable('tokens')) {
            $table
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('hash', 'string', [
                    'default' => null,
                    'limit' => 40,
                    'null' => false,
                ])
                ->addColumn('expire_date', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => true,
                ])
                ->create();
        }

        $table = $this->table('webcam_images', ['id' => false, 'primary_key' => ['timestamp', 'image_id']]);
        if (!$this->hasTable('webcam_images')) {
            $table
                ->addColumn('timestamp', 'datetime', [
                    'default' => null,
                    'limit' => null,
                    'null' => false,
                ])
                ->addColumn('image_id', 'biginteger', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('user_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => false,
                ])
                ->addColumn('bot_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addColumn('job_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->create();
        }

    }

    public function down()
    {
        if ($this->hasTable('activities')) $this->dropTable('activities');
        if ($this->hasTable('bot_queues')) $this->dropTable('bot_queues');
        if ($this->hasTable('bots')) $this->dropTable('bots');
        if ($this->hasTable('comments')) $this->dropTable('comments');
        if ($this->hasTable('email_queue')) $this->dropTable('email_queue');
        if ($this->hasTable('engine_os')) $this->dropTable('engine_os');
        if ($this->hasTable('error_log')) $this->dropTable('error_log');
        if ($this->hasTable('job_clock')) $this->dropTable('job_clock');
        if ($this->hasTable('jobs')) $this->dropTable('jobs');
        if ($this->hasTable('notifications')) $this->dropTable('notifications');
        if ($this->hasTable('oauth_consumer')) $this->dropTable('oauth_consumer');
        if ($this->hasTable('oauth_consumer_nonce')) $this->dropTable('oauth_consumer_nonce');
        if ($this->hasTable('oauth_token')) $this->dropTable('oauth_token');
        if ($this->hasTable('patches')) $this->dropTable('patches');
        if ($this->hasTable('queues')) $this->dropTable('queues');
        if ($this->hasTable('s3_files')) $this->dropTable('s3_files');
        if ($this->hasTable('shortcodes')) $this->dropTable('shortcodes');
        if ($this->hasTable('slice_configs')) $this->dropTable('slice_configs');
        if ($this->hasTable('slice_engines')) $this->dropTable('slice_engines');
        if ($this->hasTable('slice_jobs')) $this->dropTable('slice_jobs');
        if ($this->hasTable('tokens')) $this->dropTable('tokens');
        if ($this->hasTable('users')) $this->dropTable('users');
        if ($this->hasTable('webcam_images')) $this->dropTable('webcam_images');
    }
}
