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
            CURLOPT_RETURNTRANSFER =>  true,
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
            $data = !empty($data) ? array_merge($this->options, $data) : $this->options;

            curl_setopt_array($curl, $data);

            $result = curl_exec($curl);

            curl_close($curl);

            if ($result === false) {
                throw new \Exception("Error " . curl_error($curl));
            }

            return $result;

        } catch (\Exception $e) {
            echo $e->getMessage() . ' ' . $e->getCode();
        }
    }
}