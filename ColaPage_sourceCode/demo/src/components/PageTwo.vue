<template>
  <div class="page" id="PageTwo">
    <div class="logo">CocaCola</div>
    <b-container class="bv-example-row">
      <b-row class="content">
        <b-col md="6" sm="12" class="content-left">
          <h1 class="title">Coca-Cola Page</h1>
          <p>This is the Coca-Cola page made by BootstrapVue framework, there are no Sprite and Fanta page due to the heavy workload, for the source code of the this page, please see "About" in the home page</p>
        </b-col>
        <b-col md="6" sm="12">
          <img :src="require('../assets/coca-cola-hug.png')" alt="" width="213">
        </b-col>
      </b-row>
      <div class="content content-icons center">
        <img :src="require('../assets/twitter-coke.png')" width="75px" alt="">
        <img :src="require('../assets/instagram-coke.png')" width="75px" alt="">
        <img :src="require('../assets/instagram-coke.png')" width="75px" alt="">
      </div>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "page-two"
}
</script>

<style lang="scss" scoped>
.page {
  background: #fff;
  padding: 0 10rem;
  .logo {
    font-size: 50px;
    font-family: CocaCola;
    color: red;
    margin: 2rem 0;
  }
  .content {
    text-align: left;
    .title {
      font-size: 3.5rem;
      line-height: 1.1;
      color: red;
      font-weight: 900;
      margin: 1rem 0;
    }
    p {
      font-size: 1.3125rem;
      font-weight: 300;
      color: #000;
      line-height: 2rem;
    }
  }
  .content-icons {
    margin: 2rem 0;
  }
  .center {
    text-align: center;
  }
}
</style>
