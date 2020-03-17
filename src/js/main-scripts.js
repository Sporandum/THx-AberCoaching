import MobileMenu from './modules/MobileMenu'
import CurrentMenuItem from './modules/CurrentMenuItem'
import Glide from '@glidejs/glide'

new MobileMenu()

new CurrentMenuItem('presentation')
new CurrentMenuItem('services')
new CurrentMenuItem('last-posts')
new CurrentMenuItem('contact')




new Glide('.glide', {
  gap: 200
}).mount()