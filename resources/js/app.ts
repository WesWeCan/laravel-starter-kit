import './bootstrap';
import '../scss/index.scss';

import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Pages under ./Pages are resolved and mounted by the @inertiajs/vite plugin.
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    withApp(app) {
        app.use(ZiggyVue);
    },
    progress: {
        color: 'var(--text-color)',
    },
});
