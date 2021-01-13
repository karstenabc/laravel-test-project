<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>All Books</h1>
                <router-link to="/add">
                    <button class="btn btn-success mb-4">Add Book</button>
                </router-link>
                <div class="mb-4" v-for="book in books" v-bind:key="book.id">
                    <h2>Book:{{ ' ' + book.name}}</h2>
                    <p class="mb-1">By:{{ ' ' + book.author }}</p>
                    <button class="btn btn-danger" @click="deleteBook(book.id)">Delete</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                error: false,
                books: []
            }
        },

        created() {
            this.getBooks();
        },

        methods: {
            getBooks() {
                fetch('api/books')
                    .then(res => res.json())
                    .then(books => {
                        this.books = books;
                    })
                    .catch(e => {
                        console.log(e);
                    })
            },

            deleteBook(id) {
                if (confirm('Are you sure you want to delete this book?')) {
                    fetch('api/book/' + id, {
                        method: 'DELETE',
                        headers: {
                            'content-type': 'application/json'
                        }
                    })
                    .then(res => {
                        this.getBooks()
                    })
                    .catch(e => {
                        console.log(e);
                    })
                }
            }
        }
    }
</script>
