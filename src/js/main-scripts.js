import MobileMenu from './modules/MobileMenu'
import MenuLink from './modules/MenuLink'
import Glide from '@glidejs/glide'

new MobileMenu()

new MenuLink('presentation')
new MenuLink('services')
new MenuLink('last-posts', false)
new MenuLink('contact')


// Init testimonials slider on front page
if(document.getElementById('testimonials')) {
  new Glide('.glide', {
    gap: 200
  }).mount()
}