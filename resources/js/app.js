import Alpine from 'alpinejs'

import themeUI from './stores/all'

window.Alpine = Alpine
Alpine.data('themesUI', themeUI)

Alpine.start()
