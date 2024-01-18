export default [
    { path: '/', redirect: '/commands' },

    {
        path: '/rule-generator',
        name: 'rule-generator',
        component: require('./screens/generate-rules/index').default,
    },

    {
        path: '/relations-generator',
        name: 'relations-generator',
        component: require('./screens/relations-generator/index').default,
    },

    {
        path: '/commands/cache-forget',
        name: 'cache-forget',
        component: require('./screens/commands/commands-extra-info/cache-forget').default,
    },

    {
        path: `/commands/config-show`,
        name: 'config-show',
        component: require('./screens/commands/commands-extra-info/config-show').default,
    },

    {
        path: '/commands/env-decryption',
        name: 'env-decryption',
        component: require('./screens/commands/commands-extra-info/env-decryption').default
    },

    {
        path: '/commands/make',
        name: 'make',
        component: require('./screens/commands/commands-extra-info/make-inputs').default,
        props: (route) => ({ type: route.query.type })
    },

    {
        path: '/commands/command-logs-page',
        name: 'command-logs-page',
        component: require('./screens/commands/commands-extra-info/command-logs-page').default,
        props: (route) => ({ type: route.query.type })
    },

    {
        path: '/commands',
        name: 'commands',
        component: require('./screens/commands/index').default,
    },
];
