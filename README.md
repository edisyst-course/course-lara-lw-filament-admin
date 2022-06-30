Corso: https://laraveldaily.teachable.com/courses/laravel-filament-admin-practical-course/lectures/41046347

Altri plugin: https://www.youtube.com/watch?v=X0TCNexv0SY

Filament: https://filamentphp.com/docs/2.x/admin/installation

Filament installa la parte visuale, di validazione, il FE diciamo

Il BE ci deve già essere: Model (opzionali con Filament), Controller (opzionali con Filament), Migration, Relationship

Posso prendere spunto da qui per iniziare


Dentro app/Filament/Resources directory viene creato tutto:
+-- CustomerResource.php
+-- CustomerResource
|   +-- Pages
|   |   +-- CreateCustomer.php
|   |   +-- EditCustomer.php
|   |   +-- ListCustomers.php


Filament Resource
- Resource
- Menu Item
- Model


# Installazione

https://filamentphp.com/docs/2.x/admin/installation#installation

composer require filament/filament:"^2.0"
php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-translations

http://127.0.0.1:8000/admin/login
Di default tutti gli user si possono loggare, quindi devo creare dei ruoli



https://filamentphp.com/docs/2.x/admin/resources/getting-started

NOTA: In generale per aggiungere feature, io devo sovrascrivere gli elementi base di Filament.
Per esempio se scrivo 
- `$navigationGroup` 
- PHPStorm mi trova 
- `protected static ?string $navigationGroup` 
- che eseiste già, ma io posso modificare all'interno del Filament Resource

L'elemento chiave di Filament è il Resource, gestisce tipicamente un Model
```
php artisan make:filament-resource Product
```
Mi crea tutti questi file
![img.png](img.png)

File che ovviamente devo riempire
- https://filamentphp.com/docs/2.x/admin/resources/getting-started#tables
- https://filamentphp.com/docs/2.x/admin/resources/getting-started#forms
- https://filamentphp.com/docs/2.x/admin/resources/creating-records#customizing-form-redirects
- https://filamentphp.com/docs/2.x/forms/validation
- sovrascrivo anche il modo in cui vengono calcolati/mostrati gli importi (coi centesimi)
- https://filamentphp.com/docs/2.x/forms/advanced#updates
- https://filamentphp.com/docs/2.x/tables/columns#image-column

Non dimenticare di fare `php artisan storage:link` per vedere le foto

### Resource con delle relationship
- installo `composer require barryvdh/laravel-debugbar --dev` per vedere quante query fa
- https://laraveldaily.teachable.com/courses/laravel-filament-admin-practical-course/lectures/41046381
- https://filamentphp.com/docs/2.x/forms/fields#select

# Users
Faccio un composer update per Filament 2.13
- https://filamentphp.com/docs/2.x/admin/pages/actions
- forse c'è un errore nell'USER url link, ma è possibile che sia dovuto al DatabaseSeeder fatto in fretta

# Payments
Disabilito tutte le Actions, posso solo vedere la lista
- https://filamentphp.com/docs/2.x/tables/filters#custom-filter-forms

# Global Features of Admin Panel
- https://filamentphp.com/docs/2.x/admin/resources/global-search
- https://filamentphp.com/docs/2.x/admin/navigation#grouping-navigation-items
- https://filamentphp.com/docs/2.x/admin/resources/getting-started#icons
  - https://heroicons.com/
- https://filamentphp.com/docs/2.x/admin/navigation#getting-started
- https://filamentphp.com/docs/2.x/admin/resources/custom-pages
- https://filamentphp.com/docs/2.x/admin/dashboard/getting-started
  - https://filamentphp.com/docs/2.x/admin/dashboard/stats
  - https://filamentphp.com/docs/2.x/admin/dashboard/tables
    - https://filamentphp.com/docs/2.x/forms/layout#controlling-field-column-span
  - https://filamentphp.com/docs/2.x/admin/dashboard/charts
    - https://filamentphp.com/docs/2.x/admin/dashboard/charts#generating-chart-data-from-an-eloquent-model
    - Per le charts copio l'esempio usando come suggerito `composer require flowframe/laravel-trend`

# BelongsToMany Relations
- https://filamentphp.com/docs/2.x/admin/resources/relation-managers
`php artisan make:filament-relation-manager ProductResource tags name`
- https://filamentphp.com/docs/2.x/admin/resources/relation-managers#attaching-and-detaching-records

# Roles and Permissions
```injectablephp
php artisan make:policy UserPolicy --model=User
php artisan make:policy ProductPolicy --model=Product
```

https://filamentphp.com/plugins/shield
```injectablephp
composer require bezhansalleh/filament-shield
php artisan vendor:publish --tag="filament-shield-config"
php artisan shield:install
```
- Sovrascrive le Policy che ho scritto io (usa Spatie Permissions)
- Non c'è un modo per assegnare i ruoli agli utenti, dovrei modificare `UserResource/Pages/EditUser.php`


# Customizing Layouts
- https://filamentphp.com/docs/2.x/admin/resources/getting-started#simple-modal-resources
- php artisan make:filament-resource Customer --simple
- secondo
- https://filamentphp.com/docs/2.x/admin/appearance
- https://filamentphp.com/docs/2.x/forms/layout

# TODO
- https://laraveldaily.teachable.com/courses/laravel-filament-admin-practical-course/lectures/41167015
- giocare un po' con i formati vari di visualizzazione per i vari Filament/Resource che ho




