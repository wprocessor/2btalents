"use strict";

class Observer {
  observer = {};
  observe(name, ref) {
    this.observer[name] = ref;
  }
  push() {
    for (let key in this.observer) {
      this.observer[key].push();
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

onloads.observe('swiper', new class {
  push() {
    const swiper = new Swiper('.swiper', {
      direction: 'horizontal',
      centeredSlides: true,
      initialSlide: 1,
      slidesPerView: 4,
      //slidesOffsetBefore: 180,
      spaceBetween: 20,
      loop: true,
      breakpoints: {
          1366: {
              slidesPerView:4,
              spaceBetween: 20,
          },
          750: {
              slidesPerView:4,
              spaceBetween: 20,
          },
          0: {
              slidesPerView:2,
              spaceBetween: 20,
          }
      }
    });
  }
});
onloads.observe('swiper2', new class {
  push() {
    const swiper = new Swiper('.swiper2', {
      direction: 'horizontal',
      centeredSlides: true,
      initialSlide: 1,
      slidesPerView: 4,
      slidesOffsetBefore: 180,
      spaceBetween: 20,
      loop: true,
      breakpoints: {
          1366: {
              slidesPerView:4,
              spaceBetween: 20,
          },
          750: {
              slidesPerView:4,
              spaceBetween: 20,
          },
          0: {
              slidesPerView:2,
              spaceBetween: 20,
          }
      }
    });
  }
});

