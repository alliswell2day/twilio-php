<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class QueueList extends ListResource {
    /**
     * Construct the QueueList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @return \Twilio\Rest\Api\V2010\Account\QueueList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/Queues.json';
    }

    /**
     * Streams QueueInstance records from the API as a generator stream.
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
     * Reads QueueInstance records from the API as a list.
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
     * @return QueueInstance[] Array of results
     */
    public function read($limit = null, $pageSize = Values::NONE) {
        return iterator_to_array($this->stream($limit, $pageSize));
    }

    /**
     * Retrieve a single page of QueueInstance records from the API.
     * Request is executed immediately
     * 
     * @param int $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param int $pageNumber Page Number, this value is simply for client state
     * @return \Twilio\Page Page of QueueInstance
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
        
        return new QueuePage($this->version, $response, $this->solution);
    }

    /**
     * Create a new QueueInstance
     * 
     * @param array $options Optional Arguments
     * @return QueueInstance Newly created QueueInstance
     */
    public function create(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'FriendlyName' => $options['friendlyName'],
            'MaxSize' => $options['maxSize'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new QueueInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Constructs a QueueContext
     * 
     * @param string $sid Fetch by unique queue Sid
     * @return \Twilio\Rest\Api\V2010\Account\QueueContext 
     */
    public function getContext($sid) {
        return new QueueContext(
            $this->version,
            $this->solution['accountSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.QueueList]';
    }
}