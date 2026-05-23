import Alpine from 'alpinejs'

import themeUI from './stores/all'
import themeAuth from './stores/auth'
import validationJS from './stores/validation'

window.Alpine = Alpine
Alpine.data('themesUI', themeUI)
Alpine.data('themesAuth', themeAuth)
Alpine.data('validation', validationJS)

Alpine.start()
