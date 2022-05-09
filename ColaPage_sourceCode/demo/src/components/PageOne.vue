<template>
  <div id="PageOne">
    <div class="navbar">
<!--      menu spread-->
      <div class="navbar-toggler" @click="menuVisible = !menuVisible">
        <img :src="require('../assets/navbar-toggler.png')" alt="openMenu" height="32" v-if="!menuVisible">
        <img :src="require('../assets/close.svg')" alt="closeMenu" height="20" v-else>
      </div>
<!--      menu-->
      <div class="navbar-collapse" v-if="menuVisible">
        <ul class="navbar-nav nav">
          <li class="nav-item" v-for="item in treeData" :key="item.name">
            <img v-if="item.children && !item.showSubMenu" class="nav-item__collapse" @click="menuClick(item.id,null, true)" :src="require('../assets/plus.png')" alt="subMenu" height="22">
            <img v-if="item.children && item.showSubMenu" class="nav-item__collapse" @click="menuClick(item.id, item.parentId,false)" :src="require('../assets/minus.png')" alt="subMenu" height="22">
            <a class="nav-link" :class="{'weight': item.showSubMenu}" href="#"> {{ item.name }} </a>
            <ul class="submenu-wrapper" v-if="item.showSubMenu">
              <li class="nav-item" v-for="it in item.children" :key="it.name">
                <img v-if="it.children && !it.showSubMenu" class="nav-item__collapse" @click="menuClick(it.id,null, true)" :src="require('../assets/plus.png')" alt="subMenu" height="22">
                <img v-if="it.children && it.showSubMenu" class="nav-item__collapse" @click="menuClick(it.id, it.parentId, false)" :src="require('../assets/minus.png')" alt="subMenu" height="22">
                <a class="nav-link" :class="{'weight': it.showSubMenu}" href="#"> {{ it.name }} </a>
                <ul class="submenu-wrapper" v-if="it.showSubMenu">
                  <li class="nav-item" v-for="i in it.children" :key="i.name">
                    <a class="nav-link" href="#"> {{ i.name }} </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
<!--     head logo-->
      <div class="logo-container">
        <span class="logo">CocaCola</span>&nbsp;
        <span class="desc">Great Britain</span>
      </div>
    </div>
    <div class="banner">
      <img :src="require('../assets/coca-banner.png')" alt="">
<!--      to next icon-->
      <div class="carousel-scrollIndicator" @click="toPageTwo">
        <svg width="12px" height="64px" viewBox="0 0 12 64">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round">
            <g class="carousel_scrollIndicator--stroke-color" transform="translate(-513.000000, -148.000000)" stroke="#ffffff">
              <g transform="translate(513.000000, 148.000000)">
                <g transform="translate(4.000000, 0.000000)">
                  <path class="animate-line" d="M1.5,0.5 L1.5,57.5087713"></path>
                </g>
                <polyline class="animate-arrow" points="0 60 5.90429688 63.3994141 11.8398438 60"></polyline>
              </g>
            </g>
          </g>
        </svg>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "page-one",
  data() {
    return {
      menuVisible: false,
      menuData: [
        { name: 'HOME', id: 1, parentId: 0, showSubMenu: false },
        { name: 'BRANDS', id: 2, parentId: 0, showSubMenu: false },
        { name: 'Coca‑Cola original taste', id: 201, parentId: 2, showSubMenu: false },
        { name: 'Coca‑Cola zero sugar', id: 202, parentId: 2, showSubMenu: false },
        { name: 'Diet Coke', id: 203, parentId: 2, showSubMenu: false },
        { name: 'Sustainability', id: 3, parentId: 0, showSubMenu: false },
        { name: 'Global Sustainability Vision', id: 301, parentId: 3, showSubMenu: false },
        { name: 'Sustainability in Great Britain', id: 302, parentId: 3, showSubMenu: false },
        { name: 'World Without Waste | Making the future more sustainable', id: 30101, parentId: 301, showSubMenu: false },
        { name: 'Recover and Recycle', id: 30102, parentId: 301, showSubMenu: false },
        { name: 'Coca‑Cola Great Britain\'s sustainability ambition | Our sustainable initiatives | Coca‑Cola GB', id: 30201, parentId: 302, showSubMenu: false },
        { name: 'Marketing', id: 4, parentId: 0, showSubMenu: false },
        { name: 'Campaigns', id: 401, parentId: 4, showSubMenu: false },
        { name: 'Latest', id: 40101, parentId: 401, showSubMenu: false },
        { name: 'Iconic', id: 40102, parentId: 401, showSubMenu: false },
        { name: 'Launches and Innovation', id: 402, parentId: 4, showSubMenu: false },
        { name: 'Sponsorships & Partnerships', id: 403, parentId: 4, showSubMenu: false },
        { name: 'Christmas', id: 404, parentId: 4, showSubMenu: false },
        { name: 'Coca‑Cola Store London', id: 405, parentId: 4, showSubMenu: false },
        { name: 'Community', id: 5, parentId: 0, showSubMenu: false },
        { name: 'Ingredients', id: 6, parentId: 0, showSubMenu: false },
        { name: 'Our Business', id: 7, parentId: 0, showSubMenu: false },
        { name: 'Coca‑Cola App', id: 8, parentId: 0, showSubMenu: false },
        { name: 'Contact Us', id: 9, parentId: 0, showSubMenu: false },
        { name: 'feedback', id: 10, parentId: 0, showSubMenu: false },
        { name: 'Just Because', id: 11, parentId: 0, showSubMenu: false },
      ],
      treeData: [] // The Menu tree
    }
  },
  created() {
    this.getTreeData()
  },
  methods: {
    // press +
    menuClick(id, parentId, boolean) {
      const copy = JSON.parse(JSON.stringify(this.menuData))
      if (boolean) { // press +, show next menu

        copy.forEach(item => {
          if (item.id === id) {
            item.showSubMenu = boolean
            const parents = copy.filter(it => it.id === item.parentId)
            if (parents.length > 0) {
              parents.forEach(child => child.showSubMenu = boolean)
            }
          }
        })
      } else { // press -, close menue
        copy.forEach(i => {
          if (i.id === parentId) i.showSubMenu = true
        })
        const childs = copy.filter((it) => it.parentId === id)
        if (childs.length > 0) {
          childs.forEach(child => child.showSubMenu = boolean)
        }
      }
      this.getTreeData(copy)
    },
    // get tree
    getTreeData(arr) {
      const data = arr ? arr : this.menuData.map((item) => ({
        ...item
      }))
      this.treeData = this._getTreeData(data)
    },
    // turn page two to visible
    toPageTwo() {
      const pageTwoDom = document.getElementById('PageTwo')
      pageTwoDom.scrollIntoView(false)
    },
    // turn array into tree structure
    _getTreeData(data, parentKey='parentId', key='id') {
      const list = JSON.parse(JSON.stringify(data))
      function getFather() {
        var arr = [];
        list.forEach(function(item) {
          if (!list.some((value) => item[parentKey] === value[key])) {
            arr.push({...item});
          }
        });
        return arr;
      }
      function getChildren(item) {
        var brr = JSON.parse(JSON.stringify(item));
        list.forEach((value) => {
          if (value[parentKey] === item[key]) {
            if (!brr.children) brr.children = [];
            brr.children.push(getChildren(value));
          }
        });
        return brr;
      }
      return getFather().map(function(value) {
        return getChildren(value);
      });
    },
    // tree to array
    treeToArray(data, children = 'submenu') {
      let tmp = []
      data.forEach((item) => {
        tmp.push(item)
        if (item[children] && item[children].length > 0) {
          const res = this.treeToArray(item[children], children)
          tmp = tmp.concat(res)
        }
      })
      return tmp
    }
  }
}
</script>

<style lang="scss" scoped>
@font-face {
  font-family: CocaCola;
  src: url("../font/CocaCola.ttf");
}
@-webkit-keyframes indicatorAnimate {
  0% {
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    -webkit-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  50% {
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  50.1% {
    -webkit-transform-origin: 0% 90%;
    transform-origin: 0% 90%;
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  100% {
    -webkit-transform-origin: 0% 90%;
    transform-origin: 0% 90%;
    -webkit-transform: scale(1, 0);
    transform: scale(1, 0);
  }
}
@keyframes indicatorAnimate {
  0% {
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    -webkit-transform: scale(1, 0);
    transform: scale(1, 0);
  }
  50% {
    -webkit-transform-origin: 0% 0%;
    transform-origin: 0% 0%;
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  50.1% {
    -webkit-transform-origin: 0% 90%;
    transform-origin: 0% 90%;
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
  }
  100% {
    -webkit-transform-origin: 0% 90%;
    transform-origin: 0% 90%;
    -webkit-transform: scale(1, 0);
    transform: scale(1, 0);
  }
}
@-webkit-keyframes indicatorArrowAnimate {
  0% {
    -webkit-transform: translateY(-60px);
    transform: translateY(-60px);
  }
  50% {
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
  }
}
@keyframes indicatorArrowAnimate {
  0% {
    -webkit-transform: translateY(-60px);
    transform: translateY(-60px);
  }
  50% {
    -webkit-transform: translateY(0px);
    transform: translateY(0px);
  }
}

.navbar {
  font-family: "proxima-nova", sans-serif;
  font-weight: 400;
  background: #000;
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
  font-size: 1rem;
  height: 64px;
  line-height: 42px;
  display: flex;
  justify-content: flex-start;
  padding-left: 2.5rem;
  padding-right: 2.5rem;
  color: #fff;

  .navbar-collapse {
    position: fixed;
    left: 0;
    background: #000;
    padding: 0 0 1.25rem;
    opacity: .9;
    top: 4rem;
    z-index: 100;
    .navbar-nav {
      margin: 3.1875rem 0;
      height: calc(100vh - 8.3rem);
      overflow-x: hidden;
      overflow-y: auto;
      padding: 0;
      position: static;
      border-right: 1px solid red;
      .nav-item {
        min-width: 16.25rem;
        display: flex;
        align-items: center;
        flex-direction: row-reverse;
        font-size: 0.875rem;
        justify-content: flex-end;
        line-height: 1.875rem;
        padding: 0 2.5rem;
        max-width: calc(100vw / 4);
        text-align: left;
        .nav-link {
          border-bottom: 0.0625rem solid transparent;
          color: #fff;
          line-height: 1.2rem;
          margin: 0.6375rem 0;
          padding: 0.4375rem 0;
          word-break: break-word;
          hyphens: auto;
        }
        .nav-link.weight {
          font-weight: 900;
        }
        .nav-item__collapse {
          cursor: pointer;
          left: 0.5rem;
          padding: 0 10px;
        }
        .submenu-wrapper {
          min-height: 100vh;
          background: #000;
          left: 100%;
          padding: 3.1875rem 0 2rem 0;
          position: absolute;
          top: 0;
          transform: translate3d(0, 0, 0) !important;
          .nav-item {
            border-left: 1px solid red;
          }
        }
      }
    }
    .nav {

    }
  }

  .navbar-toggler {
    flex: 1;
    text-align: left;
    padding: 0;
  }

  .logo-container {
    flex: 2;
    text-align: left;
    font-size: 45px;

    .logo {
      font-family: CocaCola;
    }

    .desc {
      font-size: 20px;
    }
  }
}
.banner {
  position: relative;
  img {
    width: 100vw;
    max-height: 100vh;
  }
  .carousel-scrollIndicator {
    text-align: center;
    position: absolute;
    cursor: pointer;
    left: 50%;
    bottom: 0;
    width: 14px;
    height: 64px;
    transform: translateX(-50%);
    svg {
      filter: brightness(1.5);
    }
  }
  .carousel-scrollIndicator .animate-line {
    -webkit-animation: indicatorAnimate 2.5s ease-in-out infinite;
    animation: indicatorAnimate 2.5s ease-in-out infinite;
  }
  .carousel-scrollIndicator .animate-arrow {
    -webkit-animation: indicatorArrowAnimate 2.5s ease-in-out infinite;
    animation: indicatorArrowAnimate 2.5s ease-in-out infinite;
  }
}
</style>
