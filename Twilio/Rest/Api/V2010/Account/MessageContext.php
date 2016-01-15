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
use Twilio\Rest\Api\V2010\Account\Message\MediaList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property MediaList media
 */
class MessageContext extends InstanceContext {
    protected $_media = null;

    /**
     * Initialize the MessageContext
     * 
     * @param Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $sid Fetch by unique message Sid
     * @return MessageContext 
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);
        
        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'sid' => $sid,
        );
        
        $this->uri = '/Accounts/' . $accountSid . '/Messages/' . $sid . '.json';
    }

    /**
     * Deletes the MessageInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Fetch a MessageInstance
     * 
     * @return MessageInstance Fetched MessageInstance
     */
    public function fetch() {
        $params = Values::of(array());
        
        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );
        
        return new MessageInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the MessageInstance
     * 
     * @param array $options Optional Arguments
     * @return MessageInstance Updated MessageInstance
     */
    public function update(array $options = array()) {
        $options = new Values($options);
        
        $data = Values::of(array(
            'Body' => $options['body'],
        ));
        
        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );
        
        return new MessageInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the media
     * 
     * @return MediaList 
     */
    protected function getMedia() {
        if (!$this->media) {
            $this->media = new MediaList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }
        
        return $this->media;
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
        return '[Twilio.Api.V2010.MessageContext ' . implode(' ', $context) . ']';
    }
}