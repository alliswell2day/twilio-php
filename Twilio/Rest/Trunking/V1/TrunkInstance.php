<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string domainName
 * @property string disasterRecoveryMethod
 * @property string disasterRecoveryUrl
 * @property string friendlyName
 * @property string secure
 * @property string recording
 * @property string authType
 * @property string authTypeSet
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string sid
 * @property string url
 * @property string links
 */
class TrunkInstance extends InstanceResource {
    /**
     * Initialize the TrunkInstance
     * 
     * @return TrunkInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'domainName' => $payload['domain_name'],
            'disasterRecoveryMethod' => $payload['disaster_recovery_method'],
            'disasterRecoveryUrl' => $payload['disaster_recovery_url'],
            'friendlyName' => $payload['friendly_name'],
            'secure' => $payload['secure'],
            'recording' => $payload['recording'],
            'authType' => $payload['auth_type'],
            'authTypeSet' => $payload['auth_type_set'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'sid' => $payload['sid'],
            'url' => $payload['url'],
            'links' => $payload['links'],
        );
        
        $this->solution = array(
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return TrunkContext Context for this TrunkInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new TrunkContext(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a TrunkInstance
     * 
     * @return TrunkInstance Fetched TrunkInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the TrunkInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the TrunkInstance
     * 
     * @param array $options Optional Arguments
     * @return TrunkInstance Updated TrunkInstance
     */
    public function update(array $options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Access the originationUrls
     * 
     * @return OriginationUrlList 
     */
    protected function getOriginationUrls() {
        return $this->proxy()->originationUrls;
    }

    /**
     * Access the credentialsLists
     * 
     * @return CredentialListList 
     */
    protected function getCredentialsLists() {
        return $this->proxy()->credentialsLists;
    }

    /**
     * Access the ipAccessControlLists
     * 
     * @return IpAccessControlListList 
     */
    protected function getIpAccessControlLists() {
        return $this->proxy()->ipAccessControlLists;
    }

    /**
     * Access the phoneNumbers
     * 
     * @return PhoneNumberList 
     */
    protected function getPhoneNumbers() {
        return $this->proxy()->phoneNumbers;
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
        return '[Twilio.Trunking.V1.TrunkInstance ' . implode(' ', $context) . ']';
    }
}