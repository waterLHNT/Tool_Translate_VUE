import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import '~/plugins'
import '~/components'
//Update
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css' // import styles
import 'quill/dist/quill.snow.css' // for snow theme
import 'quill/dist/quill.bubble.css' // for bubble theme

Vue.config.productionTip = false
    //update
Vue.use(VueQuillEditor, /* { default global options } */ )
    /* eslint-disable no-new */
new Vue({
    i18n,
    store,
    router,
    ...App
})