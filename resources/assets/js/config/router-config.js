import Index from './../components/Index.vue';
import AddPersonal from './../components/profile/add-personal.vue';
import AddTeam from './../components/profile/add-team.vue';
import Completed from './../components/profile/completed.vue';

export const routes = [
    {
        path: '/',
        redirect: '/add-personal',
        component: Index,

        children: [
            {
                path: 'add-personal',
                component: AddPersonal
            },

            {
                path: 'add-team',
                component: AddTeam
            },

            {
                path: 'completed',
                component: Completed
            },
        ]
    },
];
