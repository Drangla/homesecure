# BIC4 Project: Bizarre inventions

## The library of bizarre inventions

This software lists bizarre inventions and domains belongs to them.
It is possible to search for inventions by various parameters.

## Exercise

### Already providing

All routes that are needed are implemented:
 * **GET** ```/invention``` &rarr; Lists all inventions
 * **GET** ```/list/invention``` &rarr; Returns JSON of all inventions
 * **GET** ```/list/domain``` &rarr; Returns JSON of all domains
 * **POST** ```/invention``` &rarr; Stores new inventions
 * **GET** ```/invention/{slug}``` &rarr; Show invention
 * **PUT** ```/invention/{slug}``` &rarr; Update invention
 * **DELETE** ```/invention/{slug}``` &rarr; Delete invention
 * **GET** ```/invention/{slug}/edit``` &rarr; Edit invention
 * **GET** ```/search/invention``` &rarr; Search inventions
 * **POST** ```/search/invention``` &rarr; Query inventions
 * **GET** ```/domain``` &rarr; Lists all domains
 * **GET** ```/list/domain``` &rarr; Returns JSON of all domains
 * **POST** ```/domain``` &rarr; Stores new domains
 * **GET** ```/domain/{slug}``` &rarr; Show domain
 * **PUT** ```/domain/{slug}``` &rarr; Update domain
 * **DELETE** ```/domain/{slug}``` &rarr; Delete domain
 * **GET** ```/domain/{slug}/edit``` &rarr; Edit domain

All views can be found in ```/resources/views```.

### TODO

#### VueJS

Implement your [VueJS](https://vuejs.org) components in the folder ```/resources/js/components```.
Register your components in ```/resources/js/app.js``` and use them in the following files:

 * ```/resources/views/domain```
     * ```/resources/views/domain/create.blade.php```
     * ```/resources/views/domain/edit.blade.php```
     * ```/resources/views/domain/index.blade.php```
     * ```/resources/views/domain/show.blade.php```
 * ```/resources/views/invention```
      * ```/resources/views/invention/create.blade.php```
      * ```/resources/views/invention/edit.blade.php```
      * ```/resources/views/invention/index.blade.php```
      * ```/resources/views/invention/search.blade.php```
      * ```/resources/views/invention/show.blade.php```
      
To query data for dropdowns in forms or to reload lists use the list routes:
 * **GET** ```/list/domain```
 * **GET** ```/list/invention```
 
For the search form use ```q``` as the name for the text input.
The search will be handled by the backend.

#### CSS (SCSS)

The design of the software need to be adapted.
[Bulma](https://bulma.io) is used to layout and style the website.
If wanted default styles can be overwritten by setting variables in the ```/resources/sass/_variables.scss``` file.
Also it is possible to write custom styles in ```/resources/sass/_custom.scss```.

A new logo need to be set. If pictures will be present on the website place them in ```/public/img``` folder.
Here you will also find the logo.

### Hints

#### JavaScript and CSS (SCSS)

To compile scss and JavaScript ```npm run dev``` need to be executed in the project folder.
It is also possible to run ```npm run watch``` so it is not need to execute ```npm run dev``` every time a change happend. 

#### Data for Database

To make starting developing fast there are some seeders implemented to fill all needed tables except the user table.
To populate the database run the command ```php artisan db:seed``` in the terminal in project root folder.
