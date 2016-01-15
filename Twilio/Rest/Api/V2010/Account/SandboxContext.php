<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class SandboxContext extends InstanceContext {
    /**
     * Initialize the SandboxContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @return SandboxContext 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/Sandbox.json';
    }

    /**
     * Fetch a SandboxInstance
     * 
     * @return SandboxInstance Fetched SandboxInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new SandboxInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }

    /**
     * Update the SandboxInstance
     * 
     * @param array $options Optional Arguments
     * @return SandboxInstance Updated SandboxInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'VoiceUrl' => $options['voiceUrl'],
            'VoiceMethod' => $options['voiceMethod'],
            'SmsUrl' => $options['smsUrl'],
            'SmsMethod' => $options['smsMethod'],
            'StatusCallback' => $options['statusCallback'],
            'StatusCallbackMethod' => $options['statusCallbackMethod'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new SandboxInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
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
        return '[Twilio.Api.V2010.SandboxContext ' . implode(' ', $context) . ']';
    }
}