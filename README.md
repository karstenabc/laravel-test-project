## About
This is a sample laravel project to demonstrate some PHP and Vue JS framework functionality.

## Test Information
### Part 1
The external currency API is accessible via `/currency/australian-dollars`. This will return a page which has the JSON result from the API.
The relevant files for this part are:
- `app/Http/Api/CurrencyApi.php` Which makes the request to the API and returns the result as JSON.
- `app/Http/Controllers/CurrencyController.php` Which handles the calling to the currency API and returns a view to the user when accessed via the browser.
- `tests/Feature/CurrencyTest.php` - This has the unit tests for this section.

### Part 2
I have chosen to implement an interface and a factory. These can be found (along with example usages in the `Patterns` folder) `app/Http/Patterns`.
These also have unit tests set up: `tests/Unit/SquareFactoryTest.php`.

### Part 3
I have created a simple list of books. This list can be added to or deleted from. The navigation between these components is handled via the vue-router.
- `resources/js` - This contains `app.js` and `router.js` as well as the `components folder`.
- `resources/views/layouts/app.blade.php` - The main application layout wrapper. This is extended by  
`resources/views/book/index.blade.php` which imports the Vue components.


## Set Up
To set the project up locally, please complete the following steps:

1. Make sure your system has [Node.js](https://nodejs.org/en/) 10.13 or later. If you need to install NodeJS, on Ubuntu, run:
```bash
sudo apt install nodejs
```
To check the install succeeded, run:
```bash
node -v
```
This should show the currently installed NodeJS version, eg: `v10.19.0`.


2. You will then need to install the Node Package Manager (NPM), for Ubuntu, run the following:
```bash
sudo apt install npm
```

3. Once NPM has been installed, clone this project from [Github](https://github.com/karstenabc/laravel-test-project) by running the following command:
```bash
git clone https://github.com/karstenabc/laravel-test-project.git
```

4. Enter into the project directory:
```bash
cd laravel-test-project
```

5. Install the projects' dependencies:
```bash
npm install
```

6. Finally, run the development server:
```bash
npm run dev (if you have followed the above instructions)
# or
yarn dev (if your system is set up with yarn)
```

7. Open [http://localhost:8000](http://localhost:8000) with your browser.


## Usage
### Part 1
Visit [http://localhost:8000/currency/australian-dollars](http://localhost:8000/currency/australian-dollars) in your browser.

### Part 2
Along with the other parts you can run the unit tests with `php artisan test`. However, there is no web route for this part.

### Part 3
1. Visit [http://localhost:8000/](http://localhost:8000/) in your browser. This will show all of the books that have been saved into the local database file. These books can be deleted, and new books can be added.
2. Click `Add Book` to be taken to the add book page via vue-router and fill out the details and click `Add Book` or `All Books` to go back to viewing all of the stored books.
3. Click `Delete` under any book to remove it from the database.