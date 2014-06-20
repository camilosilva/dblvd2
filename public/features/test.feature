Feature: Admin login
  In order to login as an Admin
  As an App user
  I need to be able to login as an Admin
  
  Scenario: Login as an Admin
    Given I go to "http://dadblvd.localhost/login"
    When I fill in "_username" with "local"
    When I fill in "_password" with "foo"
    When I press "Submit"
    Then I should see "Welcome!"