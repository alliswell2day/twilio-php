<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property phone_number.AddressRequirement addressRequirements
 * @property string apiVersion
 * @property string beta
 * @property string capabilities
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string friendlyName
 * @property string links
 * @property string phoneNumber
 * @property string sid
 * @property string smsApplicationSid
 * @property string smsFallbackMethod
 * @property string smsFallbackUrl
 * @property string smsMethod
 * @property string smsUrl
 * @property string statusCallback
 * @property string statusCallbackMethod
 * @property string trunkSid
 * @property string url
 * @property string voiceApplicationSid
 * @property string voiceCallerIdLookup
 * @property string voiceFallbackMethod
 * @property string voiceFallbackUrl
 * @property string voiceMethod
 * @property string voiceUrl
 */
class PhoneNumberInstance extends InstanceResource {
    /**
     * Initialize the PhoneNumberInstance
     * 
     * @return PhoneNumberInstance 
     */
    public function __construct(Version $version, array $payload, $trunkSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'addressRequirements' => $payload['address_requirements'],
            'apiVersion' => $payload['api_version'],
            'beta' => $payload['beta'],
            'capabilities' => $payload['capabilities'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'friendlyName' => $payload['friendly_name'],
            'links' => $payload['links'],
            'phoneNumber' => $payload['phone_number'],
            'sid' => $payload['sid'],
            'smsApplicationSid' => $payload['sms_application_sid'],
            'smsFallbackMethod' => $payload['sms_fallback_method'],
            'smsFallbackUrl' => $payload['sms_fallback_url'],
            'smsMethod' => $payload['sms_method'],
            'smsUrl' => $payload['sms_url'],
            'statusCallback' => $payload['status_callback'],
            'statusCallbackMethod' => $payload['status_callback_method'],
            'trunkSid' => $payload['trunk_sid'],
            'url' => $payload['url'],
            'voiceApplicationSid' => $payload['voice_application_sid'],
            'voiceCallerIdLookup' => $payload['voice_caller_id_lookup'],
            'voiceFallbackMethod' => $payload['voice_fallback_method'],
            'voiceFallbackUrl' => $payload['voice_fallback_url'],
            'voiceMethod' => $payload['voice_method'],
            'voiceUrl' => $payload['voice_url'],
        );
        
        $this->solution = array(
            'trunkSid' => $trunkSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return PhoneNumberContext Context for this PhoneNumberInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new PhoneNumberContext(
                $this->version,
                $this->solution['trunkSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a PhoneNumberInstance
     * 
     * @return PhoneNumberInstance Fetched PhoneNumberInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the PhoneNumberInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
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
        return '[Twilio.Trunking.V1.PhoneNumberInstance ' . implode(' ', $context) . ']';
    }
}