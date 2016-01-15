<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Queue;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string callSid
 * @property \DateTime dateEnqueued
 * @property string position
 * @property string uri
 * @property string waitTime
 */
class MemberInstance extends InstanceResource {
    /**
     * Initialize the MemberInstance
     * 
     * @return MemberInstance 
     */
    public function __construct(Version $version, array $payload, $accountSid, $queueSid, $callSid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'callSid' => $payload['call_sid'],
            'dateEnqueued' => Deserialize::iso8601DateTime($payload['date_enqueued']),
            'position' => $payload['position'],
            'uri' => $payload['uri'],
            'waitTime' => $payload['wait_time'],
        );
        
        $this->solution = array(
            'accountSid' => $accountSid,
            'queueSid' => $queueSid,
            'callSid' => $callSid ?: $this->properties['callSid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return MemberContext Context for this MemberInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new MemberContext(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['queueSid'],
                $this->solution['callSid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a MemberInstance
     * 
     * @return MemberInstance Fetched MemberInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Update the MemberInstance
     * 
     * @param string $url The url
     * @param string $method The method
     * @return MemberInstance Updated MemberInstance
     */
    public function update($url, $method) {
        return $this->proxy()->update(
            $url,
            $method
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
        return '[Twilio.Api.V2010.MemberInstance ' . implode(' ', $context) . ']';
    }
}