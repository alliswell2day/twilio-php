<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Sip\CredentialList;

use Twilio\InstanceContext;
use Twilio\Values;
use Twilio\Version;

class CredentialContext extends InstanceContext {
    /**
     * Initialize the CredentialContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $credentialListSid The credential_list_sid
     * @param string $sid The sid
     * @return CredentialContext 
     */
    public function __construct(Version $version, $accountSid, $credentialListSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'credentialListSid' => $credentialListSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/SIP/CredentialLists/' . $credentialListSid . '/Credentials/' . $sid . '.json';
    }

    /**
     * Fetch a CredentialInstance
     * 
     * @return CredentialInstance Fetched CredentialInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new CredentialInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['credentialListSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the CredentialInstance
     * 
     * @param string $username The username
     * @param string $password The password
     * @return CredentialInstance Updated CredentialInstance
     */
    public function update($username, $password) {
        $data = Values::of(array(
            'Username' => $username,
            'Password' => $password,
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new CredentialInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['credentialListSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the CredentialInstance
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
        return '[Twilio.Api.V2010.CredentialContext ' . implode(' ', $context) . ']';
    }
}