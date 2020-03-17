class MobileMenu {
  constructor() {
    this.menuIcon = document.getElementById('site-header__menu-icon')
    this.burgerIcon = document.getElementById('burger-icon')
    this.menuContent = document.getElementById('site-header__menu-content')
    this.events()
  }
  // Events
  events() {
    this.menuIcon.addEventListener('click', () => this.toggleMenu())
  }

  // Methods
  toggleMenu() {
    this.menuContent.classList.toggle('site-header__menu-content--is-visible')
    this.burgerIcon.classList.toggle('burger-icon--close-x')
  }
}

export default MobileMenu