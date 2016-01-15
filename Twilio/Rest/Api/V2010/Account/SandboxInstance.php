<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string pin
 * @property string accountSid
 * @property string phoneNumber
 * @property string applicationSid
 * @property string apiVersion
 * @property string voiceUrl
 * @property string voiceMethod
 * @property string smsUrl
 * @property string smsMethod
 * @property string statusCallback
 * @property string statusCallbackMethod
 * @property string uri
 */
class SandboxInstance extends InstanceResource {
    /**
     * Initialize the SandboxInstance
     * 
     * @return SandboxInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'pin' => $payload['pin'],
            'accountSid' => $payload['account_sid'],
            'phoneNumber' => $payload['phone_number'],
            'applicationSid' => $payload['application_sid'],
            'apiVersion' => $payload['api_version'],
            'voiceUrl' => $payload['voice_url'],
            'voiceMethod' => $payload['voice_method'],
            'smsUrl' => $payload['sms_url'],
            'smsMethod' => $payload['sms_method'],
            'statusCallback' => $payload['status_callback'],
            'statusCallbackMethod' => $payload['status_callback_method'],
            'uri' => $payload['uri'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return SandboxContext Context for this SandboxInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new SandboxContext(
                $this->version,
                $this->solution['accountSid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a SandboxInstance
     * 
     * @return SandboxInstance Fetched SandboxInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the SandboxInstance
     * 
     * @param array $options Optional Arguments
     * @return SandboxInstance Updated SandboxInstance
     */
    public function update(array $options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Api.V2010.SandboxInstance ' . implode(' ', $context) . ']';
    }
}