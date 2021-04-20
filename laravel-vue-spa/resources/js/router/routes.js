function page(path) {
    return () =>
        import ( /* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
    { path: '/', name: 'welcome', component: page('welcome.vue') },

    { path: '/login', name: 'login', component: page('auth/login.vue') },
    { path: '/register', name: 'register', component: page('auth/register.vue') },
    { path: '/password/reset', name: 'password.request', component: page('auth/password/email.vue') },
    { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset.vue') },
    { path: '/home', name: 'home', component: page('home.vue') },
    //Group route
    {
        path: '/settings',
        component: page('settings/index.vue'),
        children: [
            { path: '', redirect: { name: 'settings.profile' } },
            { path: 'profile', name: 'settings.profile', component: page('settings/profile.vue') },
            { path: 'password', name: 'settings.password', component: page('settings/password.vue') }
        ]
    },
    //Users
    {
        path: '/users',
        component: page('users/index.vue'),
        children: [
            { path: '', redirect: { name: 'users.list' } },
            { path: 'list', name: 'users.list', component: page('users/list.vue') },
            { path: 'create', name: 'users.create', component: page('users/create.vue') },
            { path: 'update/:id', name: 'users.update', component: page('users/update.vue') },
        ]
    },
    //Translations
    {
        path: '/translations',
        component: page('translations/index.vue'),
        children: [
            { path: '', redirect: { name: 'translations.list' } },
            { path: 'list', name: 'translations.list', component: page('translations/list.vue') },
            { path: 'create', name: 'translations.create', component: page('translations/create.vue') },
            { path: 'update/:id', name: 'translations.update', component: page('translations/update.vue') },
        ]
    },
    //Page Trans
    { path: '/window/trans/:id', name: 'window.trans', component: page('translation.vue') },

    { path: '*', component: page('errors/404.vue') }
]