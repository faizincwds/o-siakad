import Alpine from 'alpinejs'

import themeUI from './stores/all'
import themeAuth from './stores/auth'

window.Alpine = Alpine
Alpine.data('themesUI', themeUI)
Alpine.data('themesAuth', themeAuth)

Alpine.start()
