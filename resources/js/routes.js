import HomePage from './components/HomePage.vue';
import FormOrders from './components/FormOrders.vue';
import DetailsProduct from './components/DetailsProduct.vue';
import HistoryOrders from './components/HistoryOrders.vue';

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
        name: 'history',
        path: '/history/:id',
        component: HistoryOrders
    }
];
