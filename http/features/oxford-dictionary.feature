Feature: Oxford Dictionary Word

  Scenario: I want to get a dictionary word explanation
    Given I am unauthenicated a user
    When I request a about word "basketball"
    Then The results should include a json object, where id is equal to this word