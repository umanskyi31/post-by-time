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
     * Array content
     * @var string
     */
    protected $message;

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
     * @param array $content
     */
    public function setMessage(array $content = array())
    {
        $this->message = http_build_query($content);
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @return string
     */
    public function send(string $url, string $method, array $data = array()): string
    {
        try {

            $buildLink = $url . $method;

            //set data and convert to string
            $this->setMessage($data);

            //after convert get new data
            $buildLink .= $this->getMessage();

            $curl = curl_init($buildLink);

            //worked only with param "text" - set data and set only with params "text"
            curl_setopt_array($curl, array_merge($data, $this->options));

            $result = curl_exec($curl);

            if ($result === false) {
                throw new \Exception("Error " . curl_error($curl));
            }

            $result = json_decode($result);

            curl_close($curl);

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getCode();
        }
    }
}