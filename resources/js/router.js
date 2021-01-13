import Vue from 'vue';
import VueRouter from 'vue-router';
import Books from './components/Books';
import AddBook from './components/AddBook';

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: Books
    },
    {
        path: '/add',
        component: AddBook
    }
]

export default new VueRouter({ mode: 'history', routes: routes })