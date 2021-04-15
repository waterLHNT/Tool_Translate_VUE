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
        path: '/admin/users',
        component: page('users/index.vue'),
        children: [
            { path: 'index', name: 'users.index', component: page('users/index.vue') },
            { path: 'create', name: 'users.create', component: page('users/create.vue') },
            { path: 'update', name: 'users.update', component: page('users/update.vue') },
        ]
    },

    { path: '*', component: page('errors/404.vue') }
]