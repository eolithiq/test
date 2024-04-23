<?php

/**
 * 
 * @package 
 */
class API
{
    private $participants;
    private $type;
    private $method;

    /**
     * 
     * @return void 
     */
    public function result()
    {
        $contents = json_decode(file_get_contents('http://www.boredapi.com/api/activity?participants=' . $this->numberParticipants() . '&type=' . $this->typeRest()));
        $this->methodResult($contents);
    }

    /**
     * 
     * @return string|false|void 
     */
    private function numberParticipants()
    {
        echo 'Please input number of participants (0 - 8): ' . PHP_EOL;
        $this->participants = readline();

        if ($this->participants >= 0 && $this->participants <= 8) {
            return $this->participants;
        }

        $this->numberParticipants();
    }

    /**
     * 
     * @return string|false|void 
     */
    private function typeRest()
    {
        $typeRestArray = ["education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"];
        echo 'Please input type of rest ("education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"): ' . PHP_EOL;
        $this->type = readline();

        if (in_array($this->type, $typeRestArray)) {
            return  $this->type;
        }

        $this->typeRest();
    }

    /**
     * 
     * @return string|false|void 
     */
    private function methodOutput()
    {
        $methodArray = ["file", "console"];
        echo 'Please input method of sending the message ("file", "console"): ' . PHP_EOL;
        $this->method = readline();

        if (in_array($this->method, $methodArray)) {
            return $this->method;
        }

        $this->methodOutput();
    }

    /**
     * 
     * @param mixed $contents 
     * @return void 
     */
    private function file($contents)
    {
        $dir = 'files';

        if (!is_dir($dir)) {
            mkdir($dir);
        }

        $file = $dir . DIRECTORY_SEPARATOR . 'result-' . time() . '.txt';
        $data = $this->contentsData($contents);

        file_put_contents($file, $data);

        echo 'File was created!' . PHP_EOL;
    }

    /**
     * 
     * @param mixed $contents 
     * @return void 
     */
    private function console($contents)
    {
        echo $this->contentsData($contents);
    }

    /**
     * 
     * @param mixed $contents 
     * @return void 
     */
    private function methodResult($contents)
    {
        switch ($this->methodOutput()) {
            case 'file':
                return $this->file($contents);
            case 'console':
                return $this->console($contents);
        }
    }

    /**
     * 
     * @param mixed $data 
     * @return string 
     */
    private function contentsData($data)
    {
        $result = '';

        foreach ($data as $key => $value) {
            if ($key !== 'error') {
                $result .= $key . ': ' . $value . PHP_EOL;
            } else {
                $result .= $value;
            }
        }

        return $result;
    }
}
