<?php

/**
 * @property CI_Output $output
 */
class CaptchaController extends CI_Controller
{

	public function index()
	{
		$maxnumber = 100000;



		// Generate a random salt (recommended length: at least 10 characters)
		$salt = bin2hex(random_bytes(10)); // Generates a 20-character hex string

		// Generate a random secret number (positive integer)
		// Range between 0...maxnumber
		// Ensure NOT to expose this number to the client
		$secret_number = random_int(0, $maxnumber);

		// Compute the SHA-256 hash of the concatenated salt + secret_number (result encoded as HEX string)
		$challenge = hash('sha256', $salt . $secret_number);

		// Create a server signature using an HMAC key (result encoded as HEX string)
		$hmac_key = 'your_hmac_key_here'; // Replace with your actual HMAC key
		$signature = hash_hmac('sha256', $challenge, $hmac_key);

		// Return JSON-encoded data
		$response = [
			'algorithm' => 'SHA-256',
			'challenge' => $challenge,
			'maxnumber' => $maxnumber,
			'salt' => $salt,
			'signature' => $signature,
		];

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}
}
