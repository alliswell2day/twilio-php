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

class ConnectAppList extends ListResource {
    /**
     * Construct the ConnectAppList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The unique sid that identifies this account
     * @return ConnectAppList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/ConnectApps.json';
    }

    /**
     * Constructs a ConnectAppContext
     * 
     * @param string $sid Fetch by unique connect-app Sid
     * @return ConnectAppContext 
     */
    public function getContext($sid) {
        return new ConnectAppContext(
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
        return '[Twilio.Api.V2010.ConnectAppList]';
    }
}