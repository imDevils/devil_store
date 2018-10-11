<template>
	<div class="detail-wrap">
		<div class="detail-left">
			<div class="product-board">
				<img :src="getUrl" />
				<ul>
					<router-link exact v-for="(nav,index) in detailNav" :key="index" :to="/detail/+nav.tag">
						<li>{{ nav.title }}</li>
					</router-link>
				</ul>
			</div>
		</div>
		<div class="detail-right">
			<router-view></router-view>
		</div>
	</div>
</template>

<script>
	
	export default{
		name:"detail",
		data(){
			return{
				detailNav:[
					{
						title:"开放产品",
		        		tag:"earth"
					},
					{
						title:"品牌营销",
		        		tag:"loud"
					},
					{
						title:"使命必达",
		        		tag:"car"
					},
					{
						title:"勇攀高峰",
		        		tag:"hill"
					}
				],
				imgUrl:{
					"/detail/earth":require("../assets/images/1.jpg"),
					"/detail/loud":require("../assets/images/2.jpg"),
					"/detail/car":require("../assets/images/3.jpg"),
					"/detail/hill":require("../assets/images/4.jpg")
				}
			}
		},
		computed:{
			getUrl(){
				return this.imgUrl[this.$route.path];
			}
		}
	}
	
</script>

<style scoped>
.detail-wrap{
	width: 1200px;
	margin: 0 auto;
	overflow: hidden;
	padding-top: 20px;
}
.detail-left{
	float: left;
	width: 200px;
}
.detail-right{
	float: left;
	width: 900px;
	margin-left: 20px;
}
.product-board{
	background: #fff;
	padding-bottom: 20px;
}
.product-board img{
	padding: 10px;
	width: 180px;
	height: 180px;
}
.product-board ul{
	margin-top: 10px;
}
.product-board li{
	line-height: 30px;
	font-size: 16px;
	padding-left: 20px;
}
.product-board li:hover{
	cursor: pointer;
	color: #fff;
	background: #42B983;
}
.active{
	display: block;
	color: #fff;
	background: #42B983;
}
</style>