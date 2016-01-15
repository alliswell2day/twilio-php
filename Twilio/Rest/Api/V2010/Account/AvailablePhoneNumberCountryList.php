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

class AvailablePhoneNumberCountryList extends ListResource {
    /**
     * Construct the AvailablePhoneNumberCountryList
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid A 34 character string that uniquely identifies
     *                           this resource.
     * @return AvailablePhoneNumberCountryList 
     */
    public function __construct(Version $version, $accountSid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/AvailablePhoneNumbers.json';
    }

    /**
     * Constructs a AvailablePhoneNumberCountryContext
     * 
     * @param string $countryCode The country_code
     * @return AvailablePhoneNumberCountryContext 
     */
    public function getContext($countryCode) {
        return new AvailablePhoneNumberCountryContext(
            $this->version,
            $this->solution['accountSid'],
            $countryCode
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        return '[Twilio.Api.V2010.AvailablePhoneNumberCountryList]';
    }
}