<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\LocalList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\MobileList;
use Twilio\Rest\Api\V2010\Account\AvailablePhoneNumberCountry\TollFreeList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property LocalList local
 * @property TollFreeList tollFree
 * @property MobileList mobile
 */
class AvailablePhoneNumberCountryContext extends InstanceContext {
    protected $_local = null;
    protected $_tollFree = null;
    protected $_mobile = null;

    /**
     * Initialize the AvailablePhoneNumberCountryContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $countryCode The country_code
     * @return AvailablePhoneNumberCountryContext 
     */
    public function __construct(Version $version, $accountSid, $countryCode) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'countryCode' => $countryCode,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/AvailablePhoneNumbers/' . $countryCode . '.json';
    }

    /**
     * Fetch a AvailablePhoneNumberCountryInstance
     * 
     * @return AvailablePhoneNumberCountryInstance Fetched
     *                                             AvailablePhoneNumberCountryInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new AvailablePhoneNumberCountryInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['countryCode']
        );
    }

    /**
     * Access the local
     * 
     * @return LocalList 
     */
    protected function getLocal() {
        if (!$this->local) {
            $this->local = new LocalList(
                $this->version,
                $this->solution['countryCode'],
                $this->solution['accountSid']
            );
        }
        
        return $this->local;
    }

    /**
     * Access the tollFree
     * 
     * @return TollFreeList 
     */
    protected function getTollFree() {
        if (!$this->tollFree) {
            $this->tollFree = new TollFreeList(
                $this->version,
                $this->solution['countryCode'],
                $this->solution['accountSid']
            );
        }
        
        return $this->tollFree;
    }

    /**
     * Access the mobile
     * 
     * @return MobileList 
     */
    protected function getMobile() {
        if (!$this->mobile) {
            $this->mobile = new MobileList(
                $this->version,
                $this->solution['countryCode'],
                $this->solution['accountSid']
            );
        }
        
        return $this->mobile;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name) {
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown subresource ' . $name);
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
        return '[Twilio.Api.V2010.AvailablePhoneNumberCountryContext ' . implode(' ', $context) . ']';
    }
}