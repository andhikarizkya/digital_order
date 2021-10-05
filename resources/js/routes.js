import HomePage from './components/HomePage.vue';
import DetailProducts from './components/DetailProducts.vue';
import FormOrders from './components/FormOrders.vue';

export const routes = [
    {
        name: 'main',
        path: '/main',
        component: HomePage
    },
    {
        name: 'detailProducts',
        path: '/detail',
        component: DetailProducts
    },
    {
        name: 'order',
        path: '/FormOrders',
        component: FormOrders
    }
];
