"use strict";

Object.prototype.replaceOptions = function (options)
{
  if (this instanceof Object) {
    Object.keys(this).forEach((key) => Object.hasOwn(options, key) ? this[key] = options[key] : this[key] = this[key]);
  }
}

Element.prototype.removeAllChilds = function()
{
  while(this.firstChild) {
    this.removeChild(this.firstChild);
  }
}

class Observer {
  observer = {};
  observe(name, ref) {
    this.observer[name] = ref;
  }
  push() {
    for (let key in this.observer) {
      if (this.observer[key].push instanceof Function) {
        this.observer[key].push();
      }
    }
  }
};

class Onloads extends Observer {
  constructor() {
    const parentClass = super();

    window.onload = function() {
      parentClass.push();
    };
  }
}

const onloads = new Onloads();

onloads.observe('contentActivator', new class {
  push() {
    const closes = document.getElementsByClassName("content-close-button");
    for (let indexCloses = 0, countCloses = closes.length; indexCloses < countCloses; ++indexCloses) {
      const itemClose = closes[indexCloses];
      itemClose.onclick = function (e) {
        e.target.closest('.content-about').style.display = 'none';
        const contents = document.getElementsByClassName('person-list-items--about');
        for (let indexContent = 0, countContent = contents.length; indexContent < countContent; ++indexContent) {
          const itemContent = contents[indexContent];
          itemContent.style.display = "grid";
        }
        const boths = document.getElementsByClassName("about-description-both");
        for (let indexBoth = 0, countBoth = boths.length; indexBoth < countBoth; ++indexBoth) {
          const itemBoth = boths[indexBoth];
          itemBoth.style.display = "block";
        }
      }
    }

    const elms = document.getElementsByClassName("content-activator");
    for (let index = 0, count = elms.length; index < count; ++index) {
      const item = elms[index];
      item.onclick = function (e) {
        const contents = document.getElementsByClassName(e.target.dataset.targetClass);
        for (let indexContent = 0, countContent = contents.length; indexContent < countContent; ++indexContent) {
          const itemContent = contents[indexContent];
          itemContent.style.display = "block";
        }

        const mains = document.getElementsByClassName(e.target.dataset.mainClass);
        for (let indexMain = 0, countMain = mains.length; indexMain < countMain; ++indexMain) {
          const itemMain = mains[indexMain];
          itemMain.style.display = "none";
        }

        const boths = document.getElementsByClassName("about-description-both");
        for (let indexBoth = 0, countBoth = boths.length; indexBoth < countBoth; ++indexBoth) {
          const itemBoth = boths[indexBoth];
          itemBoth.style.display = "none";
        }
      }
    }
  }
});

onloads.observe('burger', new class {
  parentsUpdateClass(parents, cssCLass, collapse) {
    for (let pindex = 0, pcount = parents.length; pindex < pcount; ++pindex)
    {
      if (collapse) {
        parents[pindex].classList.remove(cssCLass);
      } else {
        parents[pindex].classList.add(cssCLass);
      }
    }
  }
  push() {
    const elms = document.getElementsByClassName("burger-menu-button");
    for (let index = 0, count = elms.length; index < count; ++index) {
      const item = elms[index];

      if (item.dataset.state === undefined || (item.dataset.state !== 'collapsed' && item.dataset.state !== 'expanded')) {
        item.dataset.state = 'collapsed';
      }

      const parents = document.getElementsByClassName(item.dataset.parent);
      const cssCLass = item.dataset.cssClass;
      const thisClass = this;

      this.parentsUpdateClass(parents, cssCLass, item.dataset.state == 'collapsed');

      item.onclick = function () {
        console.log('clicked');
        item.dataset.state = (item.dataset.state == 'collapsed') ? 'expanded' : 'collapsed';
        thisClass.parentsUpdateClass(parents, cssCLass, item.dataset.state == 'collapsed');
      }
    }
  }
});

const swiperData = {
  direction: 'horizontal',
  wrapperClass: 'swiper-wrapper',
  centeredSlides: false,
  slidesPerView: 4,
  slidesOffsetBefore:-180,
  spaceBetween: 20,
  loop: true,
  breakpoints: {
  1366: {slidesPerView:4,spaceBetween: 20},
  750: {slidesPerView:4,spaceBetween: 20},
  0: {slidesPerView:2, spaceBetween: 20}
  }
};
const swiperZoomData = {
  direction: 'horizontal',
  wrapperClass: 'swiper-wrapper',
  centeredSlides: true,
  slidesPerView: 1,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  keyboard: {
    enabled: true,
  },
};

class Clicker {
  #items = [];
  #events = {
    click: [],
  };
  constructor(query, options) {
    this.#items = document.querySelectorAll(query);

    this.#items.forEach((i) => {
      i.zoomer = this;
      i.addEventListener('click', this.clickEvent);
    });
  }
  clickEvent(e) {
    e.currentTarget.zoomer.doClick(e);
  }
  doClick(e) {
    this.#events['click'].forEach(i => i(e));
  }
  on(eventName, callback) {
    this.#events['click'].push(callback);
  }
}

let contentSwiper = undefined;
let zoomSwiper = undefined;
const zoomHideClass = 'zoom-hide';

onloads.observe('swiper', new class {
  push() {
    contentSwiper = new Swiper('.page-content .swiper', swiperData);

    const zoommer = new Clicker('.swiper-slide');
    const zoomStop = document.querySelectorAll('.zoom-stop-icon');
    const zoomContent = document.querySelector('.zoom-content');
    const pageContent = document.querySelector('.page-content');
    const bodyContent = document.querySelector('body');

    zoomStop.forEach(i => i.addEventListener('click', (e) => {
      zoomSwiper.disable();
      zoomContent.classList.toggle(zoomHideClass);
      i.classList.toggle(zoomHideClass);
      pageContent.classList.toggle(zoomHideClass);
      bodyContent.style.overflow = "visible";
      bodyContent.style.backgroundColor = "transparent";
      contentSwiper.enable();
      zoomContent.removeAllChilds();
    }));

    zoommer.on('click', (e) => {
      zoomContent.classList.toggle(zoomHideClass);
      zoomStop.forEach(i=>i.classList.toggle(zoomHideClass));
      const active = pageContent.classList.toggle(zoomHideClass);

      if (active) {
        contentSwiper.disable();
        bodyContent.style.overflow = "hidden";
        bodyContent.style.backgroundColor = "#222";
        zoomContent.appendChild(document.querySelector('.page-content .swiper').cloneNode(true));

        if (contentSwiper.clickedIndex > 0) {
          swiperZoomData.initialSlide = contentSwiper.clickedIndex;
        }

        zoomSwiper = new Swiper('.zoom-content .swiper', swiperZoomData);
        zoomSwiper.on('click', (swiper, e) => {
          console.log(e);
          if (!e.target.classList.contains('zoom-stop-icon')
          && !e.target.classList.contains('swiper-slide-active')) {
            return;
          }

          zoomSwiper.disable();
          zoomContent.classList.toggle(zoomHideClass);
          zoomStop.forEach(i=>i.classList.toggle(zoomHideClass));
          pageContent.classList.toggle(zoomHideClass);
          bodyContent.style.overflow = "visible";
          bodyContent.style.backgroundColor = "transparent";
          contentSwiper.enable();
          zoomContent.removeAllChilds();
        });
      } else {
        zoomSwiper.disable();
        zoomContent.classList.toggle(zoomHideClass);
        zoomStop.forEach(i=>i.classList.toggle(zoomHideClass));
        pageContent.classList.toggle(zoomHideClass);
        bodyContent.style.overflow = "visible";
        bodyContent.style.backgroundColor = "transparent";
        contentSwiper.enable();
      }
    });
  }
});
