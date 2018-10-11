<template>
	<div class="index-wrap">
		<div class="index-left">
			<div class="index-left-block">
				<h2>全部产品</h2>
				<div v-for="(product,index) in productList">
					<h3>{{ product.category }}</h3>
					<ul>
						<li v-for="item in product.list">
							<a target="_blank" :href="item.url">{{ item.name }}</a>
							<span v-if="item.hot" class="hot-tag">HOT</span>
						</li>
					</ul>
					<div v-if="index%2 == 0" class="hr"></div>
				</div>
			</div>
			<div class="index-left-down">
				<h2>最新资讯</h2>
					<ul>
						<li v-for="(news,index) in newsData">
							<span>{{ index+1 }}</span>
							<a target="_blank" :href="news.url"><p>{{ news.author_name }}</p></a>
						</li>
					</ul>
			</div>
		</div>
		<div class="index-right">
			<swiper :options="swiperOption">
			    <swiper-slide>
			    	<img class="swiperimg" src="../assets/1.jpg" />
			    </swiper-slide>
			    <swiper-slide>
			    	<img class="swiperimg" src="../assets/2.jpg" />
			    </swiper-slide>
			    <swiper-slide>
			    	<img class="swiperimg" src="../assets/3.jpg" />
			    </swiper-slide>
			    <swiper-slide>
			    	<img class="swiperimg" src="../assets/4.png" />
			    </swiper-slide>
			    <div class="swiper-pagination"  slot="pagination"></div>
			    <div class="swiper-button-prev" slot="button-prev"></div>
			    <div class="swiper-button-next" slot="button-next"></div>
			</swiper>
			<div class="index-board-list">
				<div v-for="(board,index) in boardList" class="index-board-item"
					 :class="['index-board-'+board.tag,{'line-last' : index%2 ==0}]">
					<div class="index-board-item-inner">
						<h2>{{ board.title }}</h2>
						<p>{{ board.desc }}</p>
						<div class="index-board-button">
							<router-link :to="/detail/+board.tag">立即购买</router-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

export default{
	name:"layout",
	data(){
		return{
			swiperOption: {
		        pagination: {
				    el: '.swiper-pagination',
				},
				loop:true,
				autoplay:true,
				navigation: {
				    nextEl: '.swiper-button-next',
				    prevEl: '.swiper-button-prev',
				},
	        },
	        boardList:[
	        	{
	        		title:"开放产品",
	        		desc:"开放产品的简单描述",
	        		tag:"earth"
	        	},
	        	{
	        		title:"品牌营销",
	        		desc:"品牌营销的简单描述",
	        		tag:"loud"
	        	},
	        	{
	        		title:"使命必达",
	        		desc:"使命必达的简单描述",
	        		tag:"car"
	        	},
	        	{
	        		title:"勇攀高峰",
	        		desc:"勇攀高峰的简单描述",
	        		tag:"hill"
	        	}
	        ],
			newsData:[],
			productList:[
				{
					category:"手机应用类",
					list:[
						{
							name:"刺激战场",
							url:"http://www.baidu.com",
							hot:true
						},
						{
							name:"王者荣耀",
							url:"http://www.baidu.com",
							hot:false
						},
						{
							name:"应用宝",
							url:"http://www.baidu.com",
							hot:false
						}
					]
				},
				{
					category:"pc产品",
					list:[
						{
							name:"英雄联盟 ",
							url:"http://www.baidu.com",
							hot:true
						},
						{
							name:"Hbuilder",
							url:"http://www.baidu.com",
							hot:false
						},
						{
							name:"Sublime",
							url:"http://www.baidu.com",
							hot:true
						}
					]
				}
			]
		}
	},
	created(){
		var url = 'http://www.wwtliu.com/sxtstu/news/juhenews.php'
		this.$axios.get(url,{
			params:{
				count:10,
				type:"top"
			}
		})
		.then(res => {
			this.newsData=res.data.result.data;
		})
		.catch(error => {
			console.log(error);
		})
	}
}

</script>

<style scoped>
.index-wrap{
	margin: 0 auto;
	overflow: hidden;
	width: 1200px;
}
.index-left{
	float: left;
	width: 300px;
	text-align: left;
}
.index-right{
	margin-top: 15px;
	width: 900px;
	float: left;
}
.index-left-block{
	margin: 15px;
	background: #fff;
	box-shadow: 0 0 1px #ddd;
	height: 350px;
}
.index-left-down{
	margin: 15px;
	background: #fff;
	box-shadow: 0 0 1px #ddd;
	height: 460px;
	overflow: scroll;
}
.index-left-block h2,.index-left-down h2{
	background: #42B983;
	color: #fff;
	padding: 10px 15px;
	margin-bottom: 20px;
	font-weight: 200;
	font-size: 16px;
}
.index-left-block h3{
	margin-bottom: 20px;
	padding: 0 15px;
}
.index-left-block li,.index-left-down li{
	margin-bottom: 10px;
	padding: 0 20px;	
}
.index-left-down span{
	float: left;
}
.index-left-down p{
	margin-left: 25px;
	padding-bottom: 10px;
}
.index-left-block .hr{
	margin-bottom: 10px;
	height: 1px;
	width: 100%;
	background: #ddd;
}
.hot-tag{
	background: red;
	color: #fff;
}
.swiperimg{
	width: 100%;
	height: 450px;
}
.line-last{
	margin-right: 20px;
}
.index-board-item{
	margin-top: 15px;
	float: left;
	background: #fff;
	width: 440px;
	height: 170px;
	box-shadow: 0 0 5px #ddd;
}
.index-board-item-inner{
	margin: 10px;
	width: 440px;
	height: 150px;
	line-height: 40px;
}
.index-board-item-inner h2,p,.index-board-button{
	margin-left: 180px;
}
.index-board-button{
	width: 100px;
	height: 40px;
	background: #42B983;
	text-align: center;
}
.index-board-button a{
	color: #fff;
}
.index-board-earth .index-board-item-inner{
	background: url(../assets/images/1.jpg) no-repeat;
	background-size: 150px 150px;
}
.index-board-loud .index-board-item-inner{
	background: url(../assets/images/2.jpg) no-repeat;
	background-size: 150px 150px;
}
.index-board-car .index-board-item-inner{
	background: url(../assets/images/3.jpg) no-repeat;
	background-size: 150px 150px;
}
.index-board-hill .index-board-item-inner{
	background: url(../assets/images/4.jpg) no-repeat;
	background-size: 150px 150px;
}
</style>