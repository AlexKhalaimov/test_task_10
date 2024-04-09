document.addEventListener('DOMContentLoaded', function (event) {

  /** menu */

  const menuBtn = document.getElementById('menu-button');
  const headerMenu = document.getElementById('header-nav-list');
  const body = document.body


// opening by clicking on the menu icon when <960px
  menuBtn.addEventListener("click", function() {
    this.classList.toggle('change');
    headerMenu.classList.toggle('opened');
    body.classList.toggle('menu-opened');
  }, false);
  window.addEventListener('resize', () => {
    if (body.classList.contains('menu-opened')){
      body.classList.remove('menu-opened')
      headerMenu.classList.remove('opened')
      menuBtn.classList.remove('change')
    }
  })
//
  const closeMenu = function (event) {
    menuBtn.classList.remove('change');
    headerMenu.classList.remove('opened');
  }

// hide opened mobile menu on scroll
// window.addEventListener("scroll", closeMenu, false);

// hide opened mobile menu on when resize screen
  window.addEventListener("resize", closeMenu, false);

  // toggle header search

  const searchToggleBtn = document.querySelector('.js-header-search-toggle')
  const toggleSearch = () => {
    const searchWrapper = document.querySelector('.header-search')
    if (searchWrapper.classList.contains('show')) {
      searchWrapper.classList.remove('show')
    } else {
      searchWrapper.classList.add('show')
    }
  }
  if (searchToggleBtn) {
      searchToggleBtn.addEventListener('click', toggleSearch)
  }

  const menuItems = document.querySelectorAll('.menu-item-has-children')
  const mq = window.matchMedia("(max-width: 992px)")
  // document.addEventListener('DOMContentLoaded', toggleMobileMenu);
  document.addEventListener('resize', toggleMobileMenu);
  function toggleMobileMenu () {
    console.log('qqqq');
    if (menuItems && mq.matches) {
      console.log(1);
      menuItems.forEach(item => {
        const toggleButton = item;
        const subMenu = item.querySelector('.sub-menu');
        item.addEventListener('click', (e) => {

          e.stopPropagation();
          if (subMenu.classList.contains('active')) {
            subMenu.classList.remove('active');
            item.classList.remove('active');
          } else {
            subMenu.classList.add('active');
            item.classList.add('active');
          }

          if (subMenu.classList.contains('active')) {
            subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
            setSubMenuHeight(subMenu)
          } else {
            subMenu.style.maxHeight = null;
            // setSubMenuHeight(subMenu)
          }
        });
      });
    }
  }
  function setSubMenuHeight (elem) {
    const subMenuDepth = parseInt(elem.dataset.depth)
    let totalHeight = elem.scrollHeight
    let isParent = (elem) => {
      return parseInt(elem.dataset.depth) === 0
    }
    if (subMenuDepth === 0) {
      const subMenuChildren = elem.querySelectorAll('.sub-menu')
      subMenuChildren.forEach(child => {
        totalHeight += child.scrollHeight
      })
      elem.style.maxHeight = `${totalHeight}px`
    } else {
      const parent = elem.parentElement.parentElement.parentElement
      parent.style.maxHeight = elem.scrollHeight + parent.scrollHeight + 'px'
    }
  }
  toggleMobileMenu()
})