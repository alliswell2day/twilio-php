<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sms;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class SmsMessageContext extends InstanceContext {
    /**
     * Initialize the SmsMessageContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $sid The sid
     * @return SmsMessageContext 
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/SMS/Messages/' . $sid . '.json';
    }

    /**
     * Deletes the SmsMessageInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a SmsMessageInstance
     * 
     * @return SmsMessageInstance Fetched SmsMessageInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new SmsMessageInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the SmsMessageInstance
     * 
     * @param array $options Optional Arguments
     * @return SmsMessageInstance Updated SmsMessageInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'Body' => $options['body'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new SmsMessageInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
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
        return '[Twilio.Api.V2010.SmsMessageContext ' . implode(' ', $context) . ']';
    }
}