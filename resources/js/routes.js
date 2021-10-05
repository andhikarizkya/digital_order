import HomePage from './components/HomePage.vue';
import FormOrders from './components/FormOrders.vue';

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
    }
];
