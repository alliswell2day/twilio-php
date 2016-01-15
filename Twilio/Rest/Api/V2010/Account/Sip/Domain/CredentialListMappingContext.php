<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\Domain;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class CredentialListMappingContext extends InstanceContext {
    /**
     * Initialize the CredentialListMappingContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $domainSid The domain_sid
     * @param string $sid The sid
     * @return CredentialListMappingContext 
     */
    public function __construct(Version $version, $accountSid, $domainSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'domainSid' => $domainSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/SIP/Domains/' . $domainSid . '/CredentialListMappings/' . $sid . '.json';
    }

    /**
     * Fetch a CredentialListMappingInstance
     * 
     * @return CredentialListMappingInstance Fetched CredentialListMappingInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new CredentialListMappingInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['domainSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the CredentialListMappingInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
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
        return '[Twilio.Api.V2010.CredentialListMappingContext ' . implode(' ', $context) . ']';
    }
}