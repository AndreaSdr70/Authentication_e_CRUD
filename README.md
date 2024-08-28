- git remote remove origin
- Comando per rimuovere l'attuale origine del progetto e poterlo associare ad una nuova repository

- Clone Progetto;
  - cp .env.example .env
  - composer i (permette di recuperare le varie librerie di cui ha bisogno il progetto)
  - andiamo a modificare il .env per aggiornare i dati relativi al database
  - php artisan key:gen
  - php artisan migrate (lancia le migrazioni che creano le tabelle nel nostro database)
  - npm i
  
  # Storage
  - la memoria adibita a contenere i media del nostro progetto
  - Locale o Esterno
    - Un servizio famoso esterno è l'S3 di AWS

  - add_img_column_to_products_table
  - questa migrazione ha il compito di aggiungere una colonna chiamata 'img' alla tabella 'products'

  - php artisan storage :link
    - Questo comando crea un link simbolico di storage all'interno della cartella public

  :product="$product"
  Utilizzo questa sintassi per passare nel componente tutto il riferimento dell'oggetto product senza superare le varie informazioni in singole proprietà;

  - Sorage::url() => metodo che ricostruisce i path dell'immagine a partire dal valore che abbiamo nel database

  # Validation

  - php artisan make:request ProductRequest
    - Crea una nuova request che può essere personalizzata

  - Display Errors
    - https://laravel.com/docs/11.x/validation#quick-displaying-the-validation-errors
    

  - List Validation Errors
    - https://laravel.com/docs/11.x/validation#available-validation-rules