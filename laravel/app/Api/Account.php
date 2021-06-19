<?
namespace App\Api;

use GuzzleHttp\Client;

class Account 
{
  protected $client;
  protected $url_mod;

  public function __construct(Client $client)
	{
		$this->client = $client;
    $this->url_mod = "?module=account";
	}

	public function getBNBBalance()
	{
		return $this->endpointRequest($this->url_mod.'&action=balance'.'&address='.env('BSC_WALLET_ADDRESS').'&tag=latest'.'&apikey='.env('BSCSCAN_API_KEY'));
	}

	// https://api.etherscan.io/api?module=account&action=txlist&address=<your hash>&startblock=0&endblock=99999999&sort=asc

	public function getBscTxnList()
	{
		$response = $this->endpointRequest($this->url_mod.'&action=txlist'.'&address='.env('BSC_WALLET_ADDRESS').'&startblock=0&endblock=99999999&sort=desc'.'&apikey='.env('BSCSCAN_API_KEY'));
		return $response->result;
	}

	public function endpointRequest($url)
	{
		try {
			$response = $this->client->request('GET', $url);
		} catch (\Exception $e) {
            return [];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}
		
		return [];
	}
}