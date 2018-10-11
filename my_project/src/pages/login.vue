<template>
	<div>
		<div class="login" v-show="showLogin">
			<h1>登录界面</h1>
			<form method="POST" action="#">
				<p><input class="user" id="user" type="text" name="username" placeholder="用户名"></p>
				<p><input class="pwd" id="pwd" type="password" name="password" placeholder="密码"></p>
				<p><input class="submit" id="submit" type="submit" name="login" value="登录"></p>
			</form>
			<span @click="toRegister">没有账号？马上注册</span>
		</div>
		
		<div class="register" v-show="showRegister">
			<h1>注册界面</h1>
			<form method="POST" action="__URL__/register">
				<p><input class="user" id="regUser" type="text" name="username" placeholder="用户名"></p>
				<p><input class="pwd" id="regPwd" type="password" name="password" placeholder="密码"></p>
				<p><input class="pwd" id="RegConPwd" type="password" name="repassword" placeholder="确认密码"></p>
				<p><input class="submit" id="regSubmit" type="submit" name="zhuce" value="注册"></p>
			</form>
			<span @click="toLogin">已有账号？马上登录</span>
		</div>
	</div>
</template>

<script>
	export default{
		name:"login",
		data(){
			return{
				showLogin:true,
				showRegister:false
			}
		},
		methods:{
			toLogin(){
				this.showLogin=true,
				this.showRegister=false
			},
			toRegister(){
				this.showLogin=false,
				this.showRegister=true
			}
		}
	}
</script>

<style scoped>
	.register{
		width: 400px;
		height: 360px;
		background: #FFFFFF;
		margin:180px auto;
		position: relative;
	}
	.register h1{
		text-align:center;
		position:absolute;
		left:144px;
		top:-48px;
		color:#9C9C9C;
	}
	.register form p{
		text-align: center;
	}
	.login{
		width: 400px;
		height: 280px;
		background: #FFFFFF;
		margin:180px auto;
		position: relative;
	}
	.login h1{
		text-align:center;
		position:absolute;
		left:144px;
		top:-48px;
		color:#9C9C9C;
	}
	.login form p{
		text-align: center;
	}
	.user{
		width: 300px;
		height: 40px;
		border:solid #9C9C9C 1px;
		border-radius: 3px;
		padding-left: 32px;
		margin-top: 50px;
		margin-bottom: 30px;
		font-size:16px;
	}
	.pwd{
		width: 300px;
		height: 40px;
		border:solid #9C9C9C 1px;
		border-radius: 3px;
		padding-left: 32px;
		margin-bottom: 30px;
		font-size:16px;
	}
	.submit{
		width: 300px;
		height: 45px;
		border:solid #ccc 1px;
		border-radius: 3px;
		font-size:16px;
		color:#fff;
		background:#4FC08D;
	}
	span{
		display: block;
		margin: 10px 137px;
		cursor: pointer;
	}
	span:hover{
		color: #4FC08D;
	}
</style>