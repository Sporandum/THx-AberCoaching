import { debounce } from 'lodash'

class MobileMenu {
  constructor() {
    this.menuIcon = document.getElementById('site-header__menu-icon')
    this.burgerIcon = document.getElementById('burger-icon')
    this.menuContent = document.getElementById('site-header__menu-content')
    this.menuItems = this.menuContent.getElementsByTagName('li')
    this.menuState = {}
    this.menuState.isOpen = false
    this.events()
  }
  // Events
  events() {
    this.menuIcon.addEventListener('click', () => this.toggleMobileMenu())

    for (let item of this.menuItems) {
      item.addEventListener('click', () => this.closeMobileMenu())
    }

    window.addEventListener('resize', debounce(() => {
      console.log('MobileMenu resize : RUN')
      if (this.menuState.isOpen && !this.isMobil()) {
        this.closeMobileMenu()
      }
    }, 200))
  }


  // Methods
  isMobil() {
    let foo = getComputedStyle(this.menuIcon).display
    if (foo === 'none') {
      return false
    }
    if (foo === 'block') {
      return true
    }
  }

  openMobileMenu() {
    this.menuContent.classList.add('site-header__menu-content--is-visible')
    this.burgerIcon.classList.add('burger-icon--close-x')
    this.menuState.isOpen = true
  }

  closeMobileMenu() {
    this.menuContent.classList.remove('site-header__menu-content--is-visible')
    this.burgerIcon.classList.remove('burger-icon--close-x')
    this.menuState.isOpen = false
  }

  toggleMobileMenu() {
    if (!this.menuState.isOpen && this.isMobil()) {
      this.openMobileMenu()
    } else {
      this.closeMobileMenu()
    }
  }
}

export default MobileMenu