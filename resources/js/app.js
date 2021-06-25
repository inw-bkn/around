window._ = require('lodash');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init({
    delay: 200,
    color: '#AD9C68'
});

createInertiaApp({
    // resolve: name => require(`./Pages/${name}`), single file
    resolve: name => import(`./Pages/${name}`), // split code:  extra request
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el);
    },
});