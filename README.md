# Relazione One to Many

- Aggiungere la FK (Foreign Key) all'interno della tabella child della relazione One to Many
  - La tabella child è quella che definisce la parte "Many" della Relazione
   - 'php artisan make:migration add_user_id_column_to_products_table'
   - Nella migrazione creo prima la colonna 
   - Poi rendo quella colonna una FK

- Istruire i nostri Modelli relazionati che possono interagire tra di loro