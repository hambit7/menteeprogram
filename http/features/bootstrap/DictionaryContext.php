<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class DictionaryContext implements Context
{
    protected $responce;
    protected $word;
    protected $baseUri = 'http://www.menteeprogram.local/http';

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am unauthenicated a user
     */
    public function iAmUnauthenicatedAUser()
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => $this->baseUri
        ]);

        $this->responce = $client->get('/');
        $responceCode = $this->responce->getStatusCode();

        if ($responceCode != 200) {
            throw new Exception("No able to access");
        }
        return true;
    }
    /**
     * @When I request a about word :arg1
     */
    public function iRequestADataFromSomeWord($arg1)
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => $this->baseUri
        ]);
        $this->word = $arg1;
        $this->responce = $client->get('?word=' . $this->word);
        $responceCode = $this->responce->getStatusCode();

        if ($responceCode != 200) {
            throw new Exception("Expexted 200, but received" . $responceCode);
        }
        return true;
    }
    /**
     * @Then The results should include a json object, where id is equal to this word
     */
    public function theResultsShouldIncludeAJsonObjectWhereIdIsEqualToThisWord()
    {
        $wordExplanation = json_decode($this->responce->getBody());
        if ($wordExplanation->id != $this->word) {
            throw new Exception("Wrong responce");
        }
        return true;
    }
}
