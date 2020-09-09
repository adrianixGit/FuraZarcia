<?php

session_start();

if(isset($_POST['dodanie_pozycji'])) {
                    
                    // Kwerenda dodawania do tabeli menu. Warto zrobic zabezpieczenia
                    $query = 'INSERT INTO menu (nazwa, sklad, cena, pozycja)
                    VALUES ("'.$_POST['nazwa'].'", "'.$_POST['sklad'].'", "'.$_POST['cena'].'", "'.$_POST['pozycja'].'")';

                    // Wykonanie kwerendy
                    $result = mysqli_query($link, $query);
                    
                    // Jesli udalo sie wykonac kwerende
                    if($result) {
                        echo '<div class="alert alert-success" role="alert">
                            Poprawnie dodano pozycje w menu
                        </div>';
                    } else {
                        // Jesli nie udalo sie wykona kwerendy
                        echo '<div class="alert alert-danger" role="alert">
                            Nie dodano pozycji w menu
                        </div>';
                    }

                }

                // Jesli wyslano formularz usuwania pozycji w menu
                if(isset($_POST['usun_poyzcje_menu'])) {
                    
                    // Kwerenda usuwajaca pozycje z menu
                    $query = 'DELETE FROM menu WHERE id_menu = '.$_POST['id_menu'];
                    
                    // wykonanie kwerendy
                    $result = mysqli_query($link, $query);

                    // Jesli udalo sie wykonac kwerende
                    if($result) {
                        echo '<div class="alert alert-success" role="alert">
                            Usunieto pozycje
                        </div>';
                    } else {
                        // Jesli nie udalo sie wykona kwerendy
                        echo '<div class="alert alert-danger" role="alert">
                            Nie usunieto pozycji
                        </div>';
                    }

                }

?>