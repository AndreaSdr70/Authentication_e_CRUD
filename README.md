# Fortify
- E' un pacchetto (libreria) first party di Laravel che serve a gestire l'autenticazione
  - Per autenticazione intendiamo un sistema di accesso e registrazione al nostro sito


- Installazione => Seguiremo tutti i procedimenti passo passo (https://laravel.com/docs/11.x/fortify#installation)
  - composer require laravel/fortify
    -Installazione delle dipendenze di php
  - php artisan fortify:install
    - Abbiamo reso disponibile al nostro progetto dei file di configurazione e delle logiche di Fortify, per poter effettuare delle modifiche al comportamento di base di Fortify 
  - php artisan migrate
    - Per lanciare la nuova migrazione che il comando precedente ci ha pubblicato

- Registrazione
  - Andiamo a definire nel FortifyServiceProvider la logica per poter visualizzare il form di registrazione
  - Copiamo la logica di questo link => https://laravel.com/docs/11.x/fortify#registration
  - Creiamo la cartella auth con dentro il file register.blade.php

 - Utiliziamo il comando php artisan route:list per vedere le rotte del bostro progetto e recuperare quelle di Fortify 

 - Logout
  - Utiliziamo la rotta post fornita da Fortify per creare un form, che mi permetta dio staccare la sessione dell'utente registrato

- Accesso (login)
  - Andiamo a definire nel FortifyServiceProvider la logica per poter visualizzare il form di accesso
 - Copiamo la logica di questo link => https://laravel.com/docs/11.x/fortify#authentication
  - Creiamo la cartella auth con dentro il file login.blade.php

## Middleware
- I middleware sono delle logiche che io scelgo di interporre e determinare richeste
  - 'auth' è l'alias del middleware che controlla se l'utente è autenticato












# CRUD