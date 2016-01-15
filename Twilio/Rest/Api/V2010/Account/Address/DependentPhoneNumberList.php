<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Address;

use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;

class DependentPhoneNumberList extends ListResource {
    /**
     * Construct the DependentPhoneNumberList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $addressSid The sid
     * @return DependentPhoneNumberList 
     */
    public function __construct(Version $version, $accountSid, $addressSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'addressSid' => $addressSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/Addresses/' . $addressSid . '/DependentPhoneNumbers.json';
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.DependentPhoneNumberList]';
    }
}