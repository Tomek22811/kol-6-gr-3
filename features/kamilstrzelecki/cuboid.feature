Feature: Obliczenia

  Scenario: Pole powierzchi bocznej prostopadloscianu
    Given I am on homepage
    When I follow "Pole powierzchi bocznej prostopadloscianu by kamilstrzelecki"
    And I fill in "A" with "2"
    And I fill in "B" with "3"
    And I fill in "H" with "4"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 40" 
