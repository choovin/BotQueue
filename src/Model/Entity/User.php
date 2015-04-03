<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'pass_hash' => true,
        'pass_reset_hash' => true,
        'location' => true,
        'birthday' => true,
        'last_active' => true,
        'registered_on' => true,
        'last_notification' => true,
        'dashboard_style' => true,
        'thingiverse_token' => true,
        'is_admin' => false,
        'activities' => true,
        'bots' => true,
        'comments' => true,
        'email_queue' => true,
        'error_log' => true,
        'job_clock' => true,
        'jobs' => true,
        'oauth_consumer' => true,
        'oauth_token' => true,
        'queues' => true,
        's3_files' => true,
        'slice_configs' => true,
        'slice_jobs' => true,
        'stats' => true,
        'tokens' => true,
        'webcam_images' => true,
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
