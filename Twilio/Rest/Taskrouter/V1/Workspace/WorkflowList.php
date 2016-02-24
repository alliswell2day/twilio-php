<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Taskrouter\V1\Workspace;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class WorkflowList extends ListResource {
    /**
     * Construct the WorkflowList
     * 
     * @param Version $version Version that contains the resource
     * @param string $workspaceSid The workspace_sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowList 
     */
    public function __construct(Version $version, $workspaceSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'workspaceSid' => $workspaceSid,
        );
        
        $this->uri = '/Workspaces/' . $workspaceSid . '/Workflows';
    }

    /**
     * Streams WorkflowInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
     * @param array $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param int $pageSize Number of records to fetch per request, when not set
     *                      will use
     *                      the default value of 50 records.  If no page_size is
     *                      defined
     *                      but a limit is defined, stream() will attempt to read
     *                      the
     *                      limit with the most efficient page size, i.e.
     *                      min(limit, 1000)
     * @return \Twilio\Stream stream of results
     */
    public function stream(array $options = array(), $limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page(
            $options, 
        $limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads WorkflowInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
     * @param array $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param int $pageSize Number of records to fetch per request, when not set
     *                      will use
     *                      the default value of 50 records.  If no page_size is
     *                      defined
     *                      but a limit is defined, read() will attempt to read the
     *                      limit with the most efficient page size, i.e.
     *                      min(limit, 1000)
     * @return WorkflowInstance[] Array of results
     */
    public function read(array $options = array(), $limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream(
            $options, 
        $limit, $pageSize));
    }

    /**
     * Retrieve a single page of WorkflowInstance records from the API.
     * Request is executed immediately
     * 
     * @param array $options Optional Arguments
     * @param int $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param int $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of WorkflowInstance
     */
    public function page(array $options = array(), $pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $options = new Values($options);
        $params = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new WorkflowPage($this->version, $response, $this->solution);
    }

    /**
     * Create a new WorkflowInstance
     * 
     * @param string $friendlyName The friendly_name
     * @param string $configuration The configuration
     * @param string $assignmentCallbackUrl The assignment_callback_url
     * @param array $options Optional Arguments
     * @return WorkflowInstance Newly created WorkflowInstance
     */
    public function create($friendlyName, $configuration, $assignmentCallbackUrl, array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'FriendlyName' => $friendlyName,
            'Configuration' => $configuration,
            'AssignmentCallbackUrl' => $assignmentCallbackUrl,
            'FallbackAssignmentCallbackUrl' => $options['fallbackAssignmentCallbackUrl'],
            'TaskReservationTimeout' => $options['taskReservationTimeout'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new WorkflowInstance(
            $this->version,
            $payload,
            $this->solution['workspaceSid']
        );
    }

    /**
     * Constructs a WorkflowContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\Taskrouter\V1\Workspace\WorkflowContext 
     */
    public function getContext($sid) {
        return new WorkflowContext(
            $this->version,
            $this->solution['workspaceSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Taskrouter.V1.WorkflowList]';
    }
}