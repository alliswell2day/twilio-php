<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace\TaskQueue;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class TaskQueueStatisticsContext extends InstanceContext {
    /**
     * Initialize the TaskQueueStatisticsContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @param string $taskQueueSid The task_queue_sid
     * @return TaskQueueStatisticsContext 
     */
    public function __construct(Version $version, $workspaceSid, $taskQueueSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'taskQueueSid' => $taskQueueSid,
        );
        
        $this->uri = '/Workspaces/' . $workspaceSid . '/TaskQueues/' . $taskQueueSid . '/Statistics';
    }

    /**
     * Fetch a TaskQueueStatisticsInstance
     * 
     * @param array $options Optional Arguments
     * @return TaskQueueStatisticsInstance Fetched TaskQueueStatisticsInstance
     */
    public function fetch(array $options = array()) {
        $options = new Values($options);
        
        $params = Values::of(array(
            'EndDate' => $options['endDate'],
            'FriendlyName' => $options['friendlyName'],
            'Minutes' => $options['minutes'],
            'StartDate' => $options['startDate'],
        ));
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new TaskQueueStatisticsInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['taskQueueSid']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Taskrouter.V1.TaskQueueStatisticsContext ' . implode(' ', $context) . ']';
    }
}