import { throttle } from 'lodash'

class CurrentMenuItem {
  constructor(sectionID) {
    this.sectionID = sectionID
    this.sectionEl = document.getElementById(sectionID)
    this.matchingLink = document.querySelector(this.sectionEl.getAttribute('data-matching-link'))
    this.menuHeight = 96
    this.elState = false
    this.events()
  }
  // Events
  events() {
    document.addEventListener('scroll', throttle(() => this.runOnScroll(), 200 ))
  }

  // Methods
  runOnScroll() {
    let elScrollY = this.sectionEl.getBoundingClientRect().y
    let elScrollYLimit = (this.sectionEl.getBoundingClientRect().height - this.menuHeight) * -1
    // console.log(`${this.sectionID} : RUN`)


    if (elScrollY < this.menuHeight && elScrollY > elScrollYLimit && !this.elState) {
      this.matchingLink.classList.add('current-menu-item')
      this.elState = true
      // console.log(`${this.sectionID} : ON`)
    }
    
    if (elScrollY > this.menuHeight || elScrollY < elScrollYLimit) {
      if(this.elState) {
        this.matchingLink.classList.remove('current-menu-item')
        this.elState = false
        // console.log(`${this.sectionID} : OFF`)
      }
    }
  }
}

export default CurrentMenuItem