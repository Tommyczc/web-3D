<template>
  <div class="page">
    <div class="divider">This is the footer</div>
<!--    <b-row class="content">-->
<!--      <b-col cols="12">-->
<!--        <h3 class="smartList__header">More on Our Brands</h3>-->
<!--      </b-col>-->
<!--      <ul class="filter">-->
<!--        <li v-for="item in filterList" :key="item.name">{{ item.name }}</li>-->
<!--      </ul>-->
<!--    </b-row>-->
  </div>
</template>

<script>
export default {
  name: "page-three",
  data() {
    return {
      filterList: [
        { name: 'all', selected: true },
        { name: 'Coca-Cola', selected: false },
        { name: 'Coca-Cola Energy', selected: false },
        { name: 'Coca-Cola zero sugar', selected: false },
        { name: 'Diet Coke', selected: false },
        { name: 'GLACÉAU Smartwater', selected: false },
        { name: 'Fanta', selected: false },
        { name: 'Dr Pepper', selected: false },
        { name: 'Sprite', selected: false },
        { name: 'Lilt', selected: false },
        { name: 'Oasis', selected: false },
        { name: 'Oasis Aquashock', selected: false },
        { name: 'Rose\'s', selected: false },
        { name: 'Powerade', selected: false },
        { name: 'Schweppes Classic', selected: false },
        { name: 'Appletiser', selected: false },
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.page {
  padding: 0 0.9375rem;
  .divider {
    height: 49px;
    background: red;
    color: #fff;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .content {
    .smartList__header {
      margin-top: 49px;
      padding: 1rem 0;
      font-weight: bold;
      font-size: 3rem;
      line-height: 3.188rem;
    }
    .filter {
      display: flex;
      justify-content: space-evenly;
      li {
        padding: 0 0.3rem;
        margin: 0 0.3rem 1rem;
        font-size: 0.75rem;
        line-height: 1.3rem;
        list-style: none;
      }
    }
  }
}
</style>
