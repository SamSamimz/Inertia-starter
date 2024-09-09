import './bootstrap';
import '../css/app.css';
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import AppLayout from '../js/Layouts/AppLayout.vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import Pagination from './vendor/Pagination.vue';
createInertiaApp({
  title: (title) => `Inertia ${title}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || AppLayout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Link',Link)
      .component('Head',Head)
      .component('Pagination',Pagination)
      .mount(el)
  },
  progress: {
    color: 'transparent',
    includeCSS: true,
    showSpinner: false,
  },
})