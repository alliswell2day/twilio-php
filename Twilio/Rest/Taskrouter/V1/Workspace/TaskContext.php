<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Taskrouter\V1\Workspace\Task\ReservationList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property ReservationList reservations
 */
class TaskContext extends InstanceContext {
    protected $_reservations = null;

    /**
     * Initialize the TaskContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @param string $sid The sid
     * @return TaskContext 
     */
    public function __construct(Version $version, $workspaceSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Workspaces/' . $workspaceSid . '/Tasks/' . $sid . '';
    }

    /**
     * Fetch a TaskInstance
     * 
     * @return TaskInstance Fetched TaskInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new TaskInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the TaskInstance
     * 
     * @param array $options Optional Arguments
     * @return TaskInstance Updated TaskInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'Attributes' => $options['attributes'],
            'AssignmentStatus' => $options['assignmentStatus'],
            'Reason' => $options['reason'],
            'Priority' => $options['priority'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new TaskInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the TaskInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the reservations
     * 
     * @return ReservationList 
     */
    protected function getReservations() {
        if (!$this->reservations) {
            $this->reservations = new ReservationList(
                $this->version,
                $this->solution['workspaceSid'],
                $this->solution['sid']
            );
        }
        
        return $this->reservations;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
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
        return '[Twilio.Taskrouter.V1.TaskContext ' . implode(' ', $context) . ']';
    }
}