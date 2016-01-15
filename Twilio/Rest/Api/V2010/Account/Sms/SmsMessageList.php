<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sms;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class SmsMessageList extends ListResource {
    /**
     * Construct the SmsMessageList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return SmsMessageList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/SMS/Messages.json';
    }

    /**
     * Create a new SmsMessageInstance
     * 
     * @param string $to The to
     * @param string $from The from
     * @param array $options Optional Arguments
     * @return SmsMessageInstance Newly created SmsMessageInstance
     */
    public function create($to, $from, array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'To' => $to,
            'From' => $from,
            'Body' => $options['body'],
            'MediaUrl' => $options['mediaUrl'],
            'StatusCallback' => $options['statusCallback'],
            'ApplicationSid' => $options['applicationSid'],
        ));
        
        $payload = $this->version->create(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new SmsMessageInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Constructs a SmsMessageContext
     * 
     * @param string $sid The sid
     * @return SmsMessageContext 
     */
    public function getContext($sid) {
        return new SmsMessageContext(
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
        return '[Twilio.Api.V2010.SmsMessageList]';
    }
}