import HomePage from './components/HomePage.vue';
import FormOrders from './components/FormOrders.vue';
import DetailsProduct from './components/DetailsProduct.vue';
import Menu from './components/Menu.vue';
import CartOrders from './components/CartOrders.vue';

export const routes = [
    {
        name: 'main',
        path: '/main',
        component: HomePage
    },
    {
        name: 'order',
        path: '/FormOrders',
        component: FormOrders
    },
    {
        name: 'detail',
        path: '/detail/:id',
        component: DetailsProduct
    },
    {
        name: 'menu',
        path: '/menu',
        component: Menu
    },
    {
        name: 'cart',
        path: '/keranjang',
        component: CartOrders
    }
];
