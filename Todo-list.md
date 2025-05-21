Naast de casus kan de volgende lijst van User Stories gebruikt worden om de opdracht te realiseren.

-   [x]  1. User Story voor Inlogsysteem 

        Als gebruiker,
        wil ik kunnen inloggen met mijn rol als monteur, planner, klant of inkoper,
        zodat ik toegang krijg tot de juiste functionaliteiten en mijn werkzaamheden kan uitvoeren.

        Acceptatiecriteria:

        Er is een inlogsysteem dat gebruikers valideert op basis van hun rol.
        Monteurs hebben toegang tot voertuigassemblage.
        Planners kunnen de planning maken en de voortgang bekijken.
        Klanten kunnen de voortgang van hun voertuig(en) in de planning volgen.
        Inkopers kunnen modules toevoegen en beheren.
-   [x] 2. User Story voor Samenstellen van Voertuigen

        Als monteur,
        wil ik verschillende modules kunnen combineren om een voertuig samen te stellen,
        zodat ik een voertuig kan bouwen volgens de wensen van de klant.

        Acceptatiecriteria:

        Gebruiker kan verschillende modules (wielen, chassis, stuur, stoelen) selecteren om een voertuig samen te stellen.
        Elke module heeft eigenschappen zoals doorlooptijd, kosten, afmetingen, afbeelding
-   [ ] 3. User Story voor Genereren van Kalender

        Als planner,
        wil ik een kalender kunnen genereren met tijdslots voor de fabricage van voertuigen,
        zodat ik de productie van voertuigen efficiënt kan plannen.

        Acceptatiecriteria:

        De kalender toont tijdslots van 2 uur, met 4 tijdslots per dag.
        Gebruiker kan tijdslots selecteren voor specifieke voertuigen in de planning.
-   [ ] 4. User Story voor Voertuig Toevoegen aan Planning

        Als planner,
        wil ik een voertuig kunnen toevoegen aan de productieplanning,
        zodat het voertuig ingepland kan worden voor assemblage.

        Acceptatiecriteria:

        De gebruiker kan voertuigen die eerder zijn samengesteld, toevoegen aan de planning.
        Het voertuig wordt toegevoegd met de bijbehorende modules en tijdslots.
-   [ ] 5. User Story voor Detailplanning van Elementen

        Als planner,
        wil ik de modules van een voertuig in de detailplanning kunnen toevoegen,
        zodat de verschillende modules van het voertuig op de juiste tijd kunnen worden gemonteerd.

        Acceptatiecriteria:

        Een voertuig wordt opgesplitst in afzonderlijke modules.
        De modules worden toegevoegd aan specifieke tijdslots in de kalender.
-   [ ] 6. User Story voor Overzicht van Voltooide Voertuigen

        Als planner,
        wil ik een overzicht kunnen zien van wanneer welk voertuig compleet is,
        zodat ik de voortgang van de productie kan volgen.

        Acceptatiecriteria:

        De applicatie toont een overzicht van alle voertuigen en hun verwachte opleveringsdatum.
        Elke voltooiing wordt gemarkeerd zodra alle modules in de planning zijn afgerond.
-   [ ] 7. User Story voor Klant Overzicht van Voortgang

        Als klant,
        wil ik de voortgang van mijn voertuig in de planning kunnen volgen,
        zodat ik kan zien wanneer mijn voertuig klaar zal zijn.

        Acceptatiecriteria:

        Klanten kunnen de voortgang van hun voertuigen zien.
        Klanten kunnen de geplande opleverdatum en de status van hun voertuig bekijken.
-   [ ] 8. User Story voor Koppeling van Afhankelijkheden Tussen Modules

        Als monteur,
        wil ik dat sommige modules pas kunnen worden gemonteerd wanneer andere modules zijn voltooid,
        zodat de montage in de juiste volgorde gebeurt.

        Acceptatiecriteria:

        Elke module kan afhankelijkheden hebben van andere modules
        De applicatie voorkomt dat een module wordt gemonteerd voordat de afhankelijkheden zijn voltooid.
-   [x] 9. User Story voor Beheer van Modules

        Als inkoper,
        wil ik modules kunnen beheren, zodat ik nieuwe modules kan toevoegen, bewerken of verwijderen,
        zodat het systeem up-to-date blijft met nieuwe voertuigcomponenten.

        Acceptatiecriteria:

        Gebruiker kan modules toevoegen, bewerken en soft-deleten (https://laravel.com/docs/11.x/eloquent#soft-deleting).
-   [x] 10. User Story voor Weergave van Modulekosten

        Als monteur of planner,
        wil ik de kosten per module kunnen zien,
        zodat ik kan berekenen hoeveel de fabricage van een voertuig gaat kosten.

        Acceptatiecriteria:

        Elke module heeft een prijs die zichtbaar is bij het samenstellen van voertuigen.
        De totale kosten van het voertuig worden berekend op basis van de gekozen modules.
-   [x] 11. User Story voor Voertuigen met Diverse Configuraties

        Als monteur,
        wil ik voertuigen kunnen samenstellen met verschillende configuraties van wielen, chassis, en andere onderdelen,
        zodat ik het voertuig kan aanpassen aan de wensen van de klant.

        Acceptatiecriteria:

        Er zijn verschillende opties voor elk onderdeel (wielen, chassis, stuur, etc.).
        Het systeem zorgt ervoor dat de geselecteerde onderdelen compatibel zijn.
-   [ ] 12. User Story voor Voertuigstatus bij Klant

        Als klant,
        wil ik de status van mijn voertuig kunnen volgen,
        zodat ik weet in welke fase van de assemblage mijn voertuig zich bevindt.

        Acceptatiecriteria:

        Klanten kunnen zien of hun voertuig is "in productie", "gereed voor levering", of "geleverd".