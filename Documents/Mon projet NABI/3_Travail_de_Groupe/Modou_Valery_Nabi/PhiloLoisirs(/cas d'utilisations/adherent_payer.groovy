Use case : payer
Acteur : adhérent
But : payer les frais des activités choisies en ligne
Pré-condition : systeme de payement accessible et que l'adhérent 
               dispose d'une carte bancaire acceptée par le systeme 
               et que son compte soit alimenté suffisament
Post-condition: pouvoir pratiquer ses activites
Scénario: Etape/acteur/Description de l'action
          1/ adhérent /choisit le payement en ligne
          2/systeme/ dirige vers le service de payement en ligne
          3/ systeme/affiche le recaputilatif de son motant à payer
                     et lui demande de choisir son type de carte
          4/adherent /fait son choix
          5/systeme/demande les coordonnées de la carte bancaire
          6/adherent/saisit les informations demandées et valide
          7/syteme/effectue une verification auprès de la banque
          8/syteme/reception de la reponse affirmatif et affiche la confirmation 
          du payement tout en proposant un lien de retour au site du club

Scenari alternatif : alternatif 3a l'adherent ne retrouve pas sa carte   
                                     dans la liste proposé
                                     retour à l'etape 1
                        
                        alternatif 7 a coordonnées bancaire éronnées
                        systeme retour a l'etape 5.

                        alternif 8a refus de payement de la banque
                        retour à l'etape 1.                                 


                                     