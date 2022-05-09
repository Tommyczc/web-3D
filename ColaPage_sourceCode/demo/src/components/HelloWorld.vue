<template>
  <div class="page">
    <div class="page-item first-page">
      <page-one />
    </div>
    <div class="page-item second-page">
      <page-two />
    </div>
    <div class="page-item second-page">
      <page-three />
    </div>
  </div>
</template>

<script>
import PageOne from './PageOne'
import PageTwo from "./PageTwo"
import PageThree from "./PageThree"

export default {
  name: 'HelloWorld',
  components: {
    PageOne, PageTwo, PageThree
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
