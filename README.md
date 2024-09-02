# Relazione Many to Many

- Ci creiamo due Modelli da mettere in relazione N - N
- Creare la migrazione per i modelli
- Creare la migrazioneper la tabella pivot
    - 'php artisan make:migration create_article_tag_table'
    - La tabella pivot si crea mettendo i nomi dei modelli al singolare minuscolo in ordine alfabetico
- Inserisco nella migrazione le due Foreign Key
- Istruire i modelli alla relazione Many to Many