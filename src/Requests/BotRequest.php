<?php

namespace Notification\Requests;

class BotRequest implements RequestsInterface
{
    /**
     * Array options for CURL
     * @var array
     */
    protected $options;

    /**
     * BotRequest constructor.
     */
    public function __construct()
    {
        //set default options
        $this->options = [
            CURLOPT_TIMEOUT => 60,
            CURLOPT_RETURNTRANSFER => 1,
            CURLINFO_HEADER_OUT => true,
            CURLOPT_POST => false,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => '',
        ];
    }


    /**
     * @return array
     */
    public function getOptions():array
    {
        return $this->options;
    }

    /**
     * @param string $content
     */
    public function setMessage(string $content)
    {
        // TODO: Implement setMessage() method.
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        // TODO: Implement getMessage() method.
    }

    /**
     * @param string $url
     * @param array $data
     */
    public function send(string $url, array $data = array()): void
    {

        try {

            $curl = curl_init($url);


            //worked only with param "text" - set data and set only with params "text"
            curl_setopt_array($curl, array_merge($data, $this->options));

            $result = curl_exec($curl);

            //todo check result

            curl_close($curl);

        } catch (\Exception $e) {
            print $e->getMessage() . ' ' . $e->getCode();
        }
    }
}