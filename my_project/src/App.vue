<template>
  <div id="app">
  	<Headers/>
    <router-view/>
    <Footers/>
  </div>
</template>

<script>


import Headers from "./components/header"
import Footers from "./components/footer"

export default {
  name: 'App',
  components:{
  	Headers,
  	Footers
  }
}
</script>

<style>
*{
	margin: 0;
	padding: 0;
}
body{
	background: #f0f2f5;
	font-size: 14px;
}
li{
	list-style: none;
}
a{
	color: #444;
	text-decoration: none;
}
</style>
