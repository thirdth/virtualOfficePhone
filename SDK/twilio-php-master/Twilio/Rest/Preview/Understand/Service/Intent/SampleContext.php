<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Understand\Service\Intent;

use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class SampleContext extends InstanceContext {
    /**
     * Initialize the SampleContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $intentSid The intent_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Preview\Understand\Service\Intent\SampleContext 
     */
    public function __construct(Version $version, $serviceSid, $intentSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array('serviceSid' => $serviceSid, 'intentSid' => $intentSid, 'sid' => $sid);

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Intents/' . rawurlencode($intentSid) . '/Samples/' . rawurlencode($sid) . '';
    }

    /**
     * Fetch a SampleInstance
     * 
     * @return SampleInstance Fetched SampleInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SampleInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['intentSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the SampleInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return SampleInstance Updated SampleInstance
     */
    public function update($options = array()) {
        $options = new Values($options);

        $data = Values::of(array(
            'Language' => $options['language'],
            'TaggedText' => $options['taggedText'],
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SampleInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['intentSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the SampleInstance
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
        return '[Twilio.Preview.Understand.SampleContext ' . implode(' ', $context) . ']';
    }
}