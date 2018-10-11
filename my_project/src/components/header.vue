<template>
	<div class="app-head">
		<div class="app-head-inner">
			<router-link to="/">
				<img src="../assets/logo.png" />
			</router-link>
			<span>i am devil</span>
			<div class="head-nav">
				<ul class="nav-list">
					<li><router-link to="/login">登录</router-link></li>
					<li class="nav-pile">|</li>
					<li><router-link to="/login">注册</router-link></li>
					<li class="nav-pile">|</li>
					<li>关于</li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>

export default{
	name:"headers",
	data(){
		return{
			
		}
	}
}

</script>

<style scoped>
a{
	color: #b2b2b2;
}
.app-head{
	background:#363636;
	width: 100%;
	height: 90px;
	color: #b2b2b2;
	line-height: 90px;
}
.app-head-inner{
	width: 1200px;
	margin:0 auto;
}
.app-head-inner img{
	width: 50px;
	margin-top: 20px;
}
.app-head-inner span{
	position: relative;
	top: -20px;
}
.head-nav{
	float: right;
}
.head-nav ul{
	overflow: hidden;
}
.head-nav li{
	cursor: pointer;
	float: left;
}
.nav-list{
	list-style: none;
}
.nav-pile{
	padding: 0 10px;
}
</style>