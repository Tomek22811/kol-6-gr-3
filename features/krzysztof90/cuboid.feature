Feature: Obliczenia

  Scenario: cuboid
    Given I am on homepage
    When I follow "cuboid by krzysztof90"
    And I fill in "E" with "5"
    And I fill in "B" with "100"
    And I fill in "H" with "4"
    And I press "Oblicz"
    Then I should see "Wynik wynosi: 840"
