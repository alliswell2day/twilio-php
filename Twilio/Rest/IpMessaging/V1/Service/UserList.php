<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V1\Service;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class UserList extends ListResource {
    /**
     * Construct the UserList
     * 
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserList 
     */
    public function __construct(Version $version, $serviceSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
        );
        
        $this->uri = '/Services/' . $serviceSid . '/Users';
    }

    /**
     * Create a new UserInstance
     * 
     * @param string $identity The identity
     * @param string $roleSid The role_sid
     * @return UserInstance Newly created UserInstance
     */
    public function create($identity, $roleSid) {
        $data = Values::of(array(
            'Identity' => $identity,
            'RoleSid' => $roleSid,
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new UserInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid']
        );
    }

    /**
     * Streams UserInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     * 
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
    public function stream($limit = null, $pageSize = null) {
        $limits = $this->version->readLimits($limit, $pageSize);
        
        $page = $this->page($limits['pageSize']);
        
        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Reads UserInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     * 
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
     * @return UserInstance[] Array of results
     */
    public function read($limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($limit, $pageSize));
    }

    /**
     * Retrieve a single page of UserInstance records from the API.
     * Request is executed immediately
     * 
     * @param int $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param int $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of UserInstance
     */
    public function page($pageSize = Values::NONE, $pageToken = Values::NONE, $pageNumber = Values::NONE) {
        $params = Values::of(array(
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ));
        
        $response = $this->version->page(
            'GET',
            $this->uri,
            $params
        );
        
        return new UserPage($this->version, $response, $this->solution);
    }

    /**
     * Constructs a UserContext
     * 
     * @param string $sid The sid
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserContext 
     */
    public function getContext($sid) {
        return new UserContext(
            $this->version,
            $this->solution['serviceSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.IpMessaging.V1.UserList]';
    }
}