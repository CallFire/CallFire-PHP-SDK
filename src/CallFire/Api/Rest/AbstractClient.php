<?php
namespace CallFire\Api\Rest;

use CallFire\Api\Rest\Request as AbstractRequest;
use CallFire\Api\Rest\Response as AbstractResponse;

use InvalidArgumentException;

abstract class AbstractClient
{
    protected $basePath;

    protected $username;

    protected $password;

    protected $http;

    public static function ns()
    {
        $ns = explode('\\', __CLASS__);
        array_pop($ns);
        $ns = implode('\\', $ns);

        return "{$ns}\\Client";
    }

    /**
     * Instantiate a request object of the given type
     *
     * @static
     * @param  string $type Request type
     * @return mixed  Request object
     */
    public static function request($type)
    {
        $requestClass = AbstractRequest::ns()."\\{$type}";

        return new $requestClass;
    }

    /**
     * Parse a response into a response type
     *
     * @static
     * @param  string $data Response data to be parsed
     * @param  string $type = 'xml' Response format
     * @return mixed  Response object
     */
    public static function response($data, $type = self::FORMAT_XML)
    {
        if (is_string($data) && strlen($data) === 0) {
            return true; // Many operations return an empty string for success
        }
        switch ($type) {
            case static::FORMAT_XML:
                return AbstractResponse::fromXml($data);
            case static::FORMAT_JSON:
                return AbstractResponse::fromJson($data);
        }
        throw new InvalidArgumentException("Type must be 'xml' or 'json'");
    }

    /**
     * Execute a GET request against an API endpoint,
     * optionally with a given Request object as parameters
     *
     * @param  string          $uri     Endpoint URL
     * @param  AbstractRequest $request = null Request object for parameters
     * @return string          Response data
     */
    public function get($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();

        if ($request) {
            $requestUri = $this->buildQuery($uri, $request->getQuery());
        } else {
            $requestUri = $uri;
        }

        $http->setOption(CURLOPT_URL, $requestUri);

        return $http->execute();
    }

    /**
     * Execute a POST request against an API endpoint,
     * optionally with a given Request object as parameters
     *
     * @param  string          $uri     Endpoint URL
     * @param  AbstractRequest $request = null Request object for parameters
     * @return string          Response data
     */
    public function post($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();

        $http->setOption(CURLOPT_POST, true);
        $http->setOption(CURLOPT_URL, $uri);
        if ($request) {
            $http->setOption(CURLOPT_POSTFIELDS, $this->buildPostData($request->getQuery()));
        }

        return $http->execute();
    }

    /**
     * Execute a PUT request against an API endpoint,
     * optionally with a given Request object as parameters
     *
     * @param  string          $uri     Endpoint URL
     * @param  AbstractRequest $request = null Request object for parameters
     * @return string          Response data
     */
    public function put($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();

        $http->setOption(CURLOPT_CUSTOMREQUEST, 'PUT');
        $http->setOption(CURLOPT_URL, $uri);
        if ($request) {
            $http->setOption(CURLOPT_POSTFIELDS, $this->buildPostData($request->getQuery()));
        }

        return $http->execute();
    }

    /**
     * Execute a DELETE request again an API endpoint,
     * optionally with a given Request object as parameters
     *
     * @param  string          $uri     Endpoint URL
     * @param  AbstractRequest $request = null Request object for parameters
     * @return string          Response data
     */
    public function delete($uri, AbstractRequest $request = null)
    {
        $http = $this->getHttpClone();

        $http->setOption(CURLOPT_CUSTOMREQUEST, 'DELETE');
        $http->setOption(CURLOPT_URL, $uri);
        if ($request) {
            $http->setOption(CURLOPT_POSTFIELDS, $this->buildPostData($request->getQuery()));
        }

        return $http->execute();
    }

    /**
     * Build a request URI for a GET request
     *
     * @param  string $uri        Endpoint URI
     * @param  array  $parameters Key-value query parameters
     * @return string The resulting URL
     */
    public function buildQuery($uri, $parameters)
    {
        $queryParameters = http_build_query($parameters);

        return "{$uri}?{$queryParameters}";
    }

    /**
     * Construct the POST fields data for a POST/PUT
     * request, according to CallFire conventions
     *
     * Reformats any array parameters to be a
     * space-concatenated list of items. Any object
     * parameters will be casted to a string, as
     * possible.
     *
     * @param  array  $parameters POST data
     * @return string Encoded POST data
     */
    public function buildPostData($parameters)
    {
        $data = array();
        foreach ($parameters as $key => $value) {
            if (is_scalar($value)) {
                $data[$key] = (string) $value;
            } elseif (is_array($value)) {
                $data[$key] = implode(' ', $value);
            }
        }

        return http_build_query($data);
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        $this->updateCredentials();

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        $this->updateCredentials();

        return $this;
    }

    public function getHttpClone()
    {
        $http = $this->getHttp();

        return clone $http;
    }

    public function getHttp()
    {
        if (!$this->http) {
            $this->http = new Http\Curl;
            $this->updateCredentials();
        }

        return $this->http;
    }

    public function setHttp(Http\Request $http)
    {
        $this->http = $http;

        return $this;
    }

    public function getUri($path, $parameters = array())
    {
        $uri = $this->getBasePath().vsprintf($path, $parameters);

        return $uri;
    }

    /**
     * Rehashes the HTTP Basic Authentication on the HTTP
     * client
     *
     * @return void
     */
    protected function updateCredentials()
    {
        if ($this->http) {
            $this->http->setOption(CURLOPT_USERPWD, implode(":", array(
                $this->getUsername(),
                $this->getPassword()
            )));
        }
    }

    const AMCONFIG_AM_ONLY = 'AM_ONLY';
    const AMCONFIG_AM_AND_LIVE = 'AM_AND_LIVE';
    const AMCONFIG_LIVE_WITH_AMD = 'LIVE_WITH_AMD';
    const AMCONFIG_LIVE_IMMEDIATE = 'LIVE_IMMEDIATE';

    const BROADCAST_VOICE = 'VOICE';
    const BROADCAST_IVR = 'IVR';
    const BROADCAST_TEXT = 'TEXT';

    const COMMAND_START = 'START';
    const COMMAND_STOP = 'STOP';
    const COMMAND_ARCHIVE = 'ARCHIVE';

    const EVENT_UNDEFINED_EVENT = 'UNDEFINED_EVENT';
    const EVENT_INBOUND_CALL_FINISHED = 'INBOUND_CALL_FINISHED';
    const EVENT_INBOUND_TEXT_FINISHED = 'INBOUND_TEXT_FINISHED';
    const EVENT_OUTBOUND_CALL_FINISHED = 'OUTBOUND_CALL_FINISHED';
    const EVENT_OUTBOUND_TEXT_FINISHED = 'OUTBOUND_TEXT_FINISHED';
    const EVENT_CAMPAIGN_STARTED = 'CAMPAIGN_STARTED';
    const EVENT_CAMPAIGN_STOPPED = 'CAMPAIGN_STOPPED';
    const EVENT_CAMPAIGN_FINISHED = 'CAMPAIGN_FINISHED';

    const FEATURE_UNSUPPORTED = 'UNSUPPORTED';
    const FEATURE_PENDING = 'PENDING';
    const FEATURE_DISABLED = 'DISABLED';
    const FEATURE_ENABLED = 'ENABLED';

    const FORMAT_XML = 'XML';
    const FORMAT_JSON = 'JSON';
    const FORMAT_SOAP = 'SOAP';
    const FORMAT_EMAIL = 'EMAIL';

    const INBOUND_TRACKING = 'TRACKING';
    const INBOUND_IVR = 'IVR';

    const RESULT_ANSWER_MACHINE = "AM";
    const RESULT_BUSY = "BUSY";
    const RESULT_DO_NOT_CALL = "DNC";
    const RESULT_TRANSFER = "XFER";
    const RESULT_TRANSFER_LEG = "XFER_LEG";
    const RESULT_NO_ANSWER = "NO_ANS";
    const RESULT_UNDIALED = "UNDIALED";
    const RESULT_SENT = "SENT";
    const RESULT_RECEIVED = "RECEIVED";
    const RESULT_DID_NOT_TRY = "DNT";
    const RESULT_TOO_BIG = "TOO_BIG";
    const RESULT_INTERNAL_ERROR = "INTERNAL_ERROR";
    const RESULT_CARRIER_ERROR = "CARRIER_ERROR";
    const RESULT_CARRIER_TEMP_ERROR = "CARRIER_TEMP_ERROR";

    const STATE_READY = "READY";
    const STATE_SELECTED = "SELECTED";
    const STATE_FINISHED = "FINISHED";
    const STATE_DO_NOT_CALL = "DNC";
    const STATE_DUPLICATE = "DUP";
    const STATE_INVALID = "INVALID";
    const STATE_TIMEOUT = "TIMEOUT";

    const STRATEGY_SEND_MULTIPLE = 'SEND_MULTIPLE';
    const STRATEGY_DO_NOT_SEND = 'DO_NOT_SEND';
    const STRATEGY_TRIM = 'TRIM';
}
