import { throttle } from 'lodash'

class CurrentMenuItem {
  constructor(sectionID, onClick = true) {
    this.sectionID = sectionID
    this.sectionEl = this.getSectionEl()
    this.sectionTitleEl = this.getSectionTitleEl()
    this.matchingLink = this.getMatchingLink()

    this.onClick = onClick
    this.menuHeight = 96
    this.elState = false
    this.events()
  }
  // Events
  events() {
    if (this.sectionEl && this.matchingLink) {
      document.addEventListener('scroll', throttle(() => this.runOnScroll(), 200))
      if (this.onClick) {
        this.matchingLink.addEventListener('click', e => this.onClickOnLink(e))
      }
    }
  }


  // Methods
  getSectionEl() {
    if (document.getElementById(this.sectionID)) {
      return document.getElementById(this.sectionID)
    }
  }

  getSectionTitleEl() {
    if (this.sectionEl) {
      return this.sectionEl.querySelector('h2')
    }
  }

  getMatchingLink() {
    if (this.sectionEl) {
      if (document.querySelector(this.sectionEl.getAttribute('data-matching-link'))) {
        return document.querySelector(this.sectionEl.getAttribute('data-matching-link'))
      }
    }
  }

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
      if (this.elState) {
        this.matchingLink.classList.remove('current-menu-item')
        this.elState = false
        // console.log(`${this.sectionID} : OFF`)
      }
    }
  }

  onClickOnLink(e) {
    e.preventDefault()
    window.scrollTo(0, this.sectionTitleEl.offsetTop - this.menuHeight)
  }
}

export default CurrentMenuItem