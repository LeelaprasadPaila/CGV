<?php

require 'vendor/autoload.php'; // Autoload the Composer generated autoload.php file

use Web3\Web3;

// Set up Ethereum node endpoint
$web3 = new Web3('http://localhost:8545'); // Replace with your Ethereum node endpoint

// Ethereum account credentials
$privateKey = 'YOUR_PRIVATE_KEY'; // Replace with the private key of the account interacting with the smart contract

// Smart contract details
$contractAddress = 'CONTRACT_ADDRESS'; // Replace with the Ethereum address of your smart contract
$abi = json_decode('YOUR_CONTRACT_ABI'); // Replace with the ABI (Application Binary Interface) of your smart contract

// Function to generate a certificate
function generateCertificate($recipientName, $dateOfBirth, $additionalInfo)
{
    global $web3, $privateKey, $contractAddress, $abi;

    // Connect to Ethereum node
    $eth = $web3->eth;

    // Create transaction data
    $data = '0x' . $abi->encodeFunctionSignature('generateCertificate(string,uint256,string)') .
            $web3->toHex($recipientName) .
            $web3->toHex($dateOfBirth) .
            $web3->toHex($additionalInfo);

    // Build transaction
    $transaction = [
        'from' => 'YOUR_SENDER_ADDRESS', // Replace with the Ethereum address sending the transaction
        'to' => $contractAddress,
        'gas' => '3000000',
        'gasPrice' => '20000000000',
        'data' => $data,
    ];

    // Sign and send transaction
    $signedTransaction = $eth->accounts->signTransaction($transaction, $privateKey);
    $transactionHash = $eth->sendRawTransaction($signedTransaction);

    return $transactionHash;
}

// Example usage
$recipientName = 'John Doe';
$dateOfBirth = strtotime('1990-01-01');
$additionalInfo = 'This person has successfully completed a course.';
$transactionHash = generateCertificate($recipientName, $dateOfBirth, $additionalInfo);

echo "Certificate generation transaction hash: $transactionHash\n";
