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
     * @return QueueList 
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
     * @return QueueContext 
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