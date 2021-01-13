<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h1>Add a new book</h1>
                <div class="alert alert-danger" role="alert" :class="[error ? '' : 'd-none']">
                    Please make sure you have entered a book name and author!
                </div>
                <form @sumbit.prevent="addBook" class="mb-3">
                    <div class="form-group">
                        <label for="name">Book name</label>
                        <input type="text" class="form-control" id="name" required placeholder="Book name" name="name" v-model="book.name">
                    </div>                       
                    <div class="form-group">
                        <label for="author">Book Author</label>
                        <input type="text" class="form-control" id="author" required placeholder="Book Author" name="author" v-model="book.author">
                    </div>

                    <button type="submit" class="btn btn-primary mr-auto" @click="addBook()">Add Book</button>
                    <router-link to="/">
                        <button class="btn btn-secondary">All Books</button>
                    </router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                error: false,
                book: {
                    author: '',
                    name: ''
                }
            }
        },

        methods: {
            addBook() {
                if (confirm('Are you sure you want to add this book?')) {
                    // Check if the form fields are valid
                    this.error = false;
                    if (this.book.name === '' && this.book.author === '') {
                        this.error = true;
                    } else {
                        // Submit form to add a new book
                        fetch('api/book', {
                            method: 'POST',
                            body: JSON.stringify(this.book),
                            headers: {
                                'content-type': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            alert('Book has been added');
                            router.replace('/');
                        })
                        .catch(e => {
                            console.log(e);
                        });
                    }
                }
            }
        }
    }
</script>
