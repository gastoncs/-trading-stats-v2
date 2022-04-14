<?php

namespace App\Infrastructure\HTTP;

use App\Infrastructure\TradingData\HttpInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Psr\Http\Message\ResponseInterface;

class GuzzleAdapter implements HttpInterface
{
    /**
     * @var string
     */
    private string $apiVersion;
    /**
     * @var string
     */
    private string $key;
    /**
     * @var string
     */
    private string $baseUri;
    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * @param array $auth
     */
    public function __construct(array $auth)
    {
        $this->apiVersion = $auth['version'];
        $this->key = $auth['key'];
        $this->baseUri = $auth['baseUri'];

        $this->httpClient = new Client(['base_uri' => $this->baseUri]);
    }

    /**
     * @param string $endpoint
     *
     *
     * @return array|mixed
     * @throws GuzzleException|JsonException
     */
    public function getRequest(string $endpoint): ?array
    {
        $response = $this->rawRequest('get', $endpoint, []);

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR) ?: [];
    }

    /**
     * @param string $endpoint
     * @param array  $postOptions
     *
     * @return array|mixed
     * @throws GuzzleException|JsonException
     */
    public function postRequest(string $endpoint, array $postOptions): ?array
    {
        $response = $this->rawRequest('post', $endpoint, $postOptions);

        return json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR) ?: [];
    }

    /**
     * @param string     $method
     * @param string     $endpoint
     * @param array|null $postOptions
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function rawRequest(string $method, string $endpoint, ?array $postOptions = null): ResponseInterface
    {
        $request = [
            'headers' => [
                'Content-Type'  => 'application/json; charset=utf-8',
                /*'Authorization' => 'Basic ' . $this->buildAuthHeader($method, $endpoint, $postOptions),*/
                'Authorization' => 'Bearer ' . $this->key
            ],
        ];

        if ($postOptions !== null) {
            $request['form_params'] = $postOptions;
        }

        $fullEndpoint = $this->baseUri . '/' . $this->apiVersion . '/' . $endpoint;
        return $this->httpClient->request($method, $fullEndpoint, $request);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array  $postOptions
     *
     * @return string
     * @throws JsonException
     */
    private function buildAuthHeader(string $method, string $endpoint, array $postOptions): string
    {
        $payload = implode("\n", [
            $method,
            $this->containerTime->format('D, d M Y H:i:s e'),
            $this->appId,
            '/' . $this->baseUri . '/' . $this->apiVersion . '/' . $endpoint,
            json_encode($postOptions, JSON_THROW_ON_ERROR),
        ]);

        return base64_encode($this->appId . ':' . base64_encode(hash_hmac('sha256', $payload, $this->appKey)));
    }
}