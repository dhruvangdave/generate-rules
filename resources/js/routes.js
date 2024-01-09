export default [
    { path: '/', redirect: '/commands' },

    {
        path: '/rule-generator',
        name: 'rule-generator',
        component: require('./screens/generate-rules/index').default,
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

    // {
    //     path: '/commands/make-command',
    //     name: 'make-command',
    //     component: require('./screens/commands/commands-extra-info/make-command').default
    // },
    //
    // {
    //     path: '/commands/make-component',
    //     name: 'make-component',
    //     component: require('./screens/commands/commands-extra-info/make-component').default
    // },
    //
    // {
    //     path: '/commands/make-controller',
    //     name: 'make-controller',
    //     component: require('./screens/commands/commands-extra-info/make-controller').default
    // },
    //
    // {
    //     path: '/commands/make-event',
    //     name: 'make-event',
    //     component: require('./screens/commands/commands-extra-info/make-event').default
    // },
    //
    // {
    //     path: '/commands/make-exception',
    //     name: 'make-exception',
    //     component: require('./screens/commands/commands-extra-info/make-exception').default
    // },
    //
    // {
    //     path: '/commands/make-factory',
    //     name: 'make-factory',
    //     component: require('./screens/commands/commands-extra-info/make-factory').default
    // },

    {
        path: '/commands/:id',
        name: 'command-preview',
        component: require('./screens/commands/preview').default,
    },

    {
        path: '/commands',
        name: 'commands',
        component: require('./screens/commands/index').default,
    },
];
