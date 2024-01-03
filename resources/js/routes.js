export default [
    { path: '/', redirect: '/commands' },

    {
        path: '/commands',
        name: 'commands',
        component: require('./screens/commands/index').default,
    },
];
