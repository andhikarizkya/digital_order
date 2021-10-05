<template>
  <div class="app">
    <header>
      <app-nav></app-nav>
    </header>
    <main>
      <router-view></router-view>
      <!-- <FlashMessage :position="'right top'"></FlashMessage> -->
    </main>
  </div>
</template>

<script>
import AppNav from './components/AppNav'

export default {
  components: {
    AppNav
  }
}
</script>

<style>
  /* .container1 {
    width: 500px;
    min-width: 500px;
    max-width: 500px;
    margin: 0 auto;
    border: 2px solid black;
  } */
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Raleway", sans-serif;
    font-weight: 100;
  }
  .app {
    min-height: 100vh;
    position: relative;
    background: #ffffff;

  }
  .container {
    padding: 0 20px;
    max-width: 1140px;
    margin: 0 auto;
  }
</style>