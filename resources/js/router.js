import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home';
import Service from './pages/Service';
import Contact from './pages/Contact';
import Product from './pages/Product';
import PostDet from './pages/PostDet';

const router = new VueRouter({
    mode:'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/i-nostri-servizi',
            name: 'service',
            component: Service
        },
        {
            path: '/i-nostri-contatti',
            name: 'contact',
            component: Contact
        },
        {
            path: '/i-nostri-prodotti',
            name: 'product',
            component: Product
        },
        {
            path: '/i-nostri-prodotti/:slug',
            name: 'product-detail',
            component: PostDet
        }
    ]
});
export default router;
