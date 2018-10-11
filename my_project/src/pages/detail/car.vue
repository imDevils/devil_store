<template>
	<div class="car-container">
		<div class="add-order">
			购买数量：
			<Counter @counter="getCommodityInfo('counter',$event)" :max="Counter.max" :min="Counter.min"/>
		</div>
		<div class="add-order">
			产品类型：
			<Downmenu @downmenu="getCommodityInfo('downmenu',$event)" :selectData="DownData" />
		</div>
		<div class="add-order">
			购买时间：
			<Radios @radios="getCommodityInfo('radios',$event)" :Radios="chooseTime" />
		</div>
		<div class="add-order">
			总价：{{ getTotalprice }}元
		</div>
		<div class="add-order">
			<div class="join-button fl">
				<router-link to="/detail/loud">加入购物车</router-link>
			</div>
			<div class="buy-button fl">
				<a href="#">立即购买</a>
			</div>
		</div>
	</div>
</template>

<script>
import Counter from "./components/counter"
import Downmenu from "./components/downMenu"
import Radios from "./components/radios"
	export default{
		name:"car",
		data(){
			return{
				counter:1,
				downmenu:1,
				radios:1,
				Counter:{
					max:10,
					min:1
				},
				DownData:[
					{
						name:"初级版",
						value:1
					},
					{
						name:"中级版",
						value:2
					},
					{
						name:"高级版",
						value:3
					}
				],
				chooseTime:[
				    {
						title:"1个月",
						value:1
					},
					{
						title:"3个月",
						value:3
					},
					{
						title:"半年",
						value:6
					},
					{
						title:"年费",
						value:12
					}
				]
			}
		},
		components:{
			Counter,
			Downmenu,
			Radios
		},
		methods:{
//			getCounterNum(data){
//				console.log(data)
//			},
//			getDownmenuVal(data){
//				console.log(data)
//			},
//			getRadiosVal(data){
//				console.log(data)
//			}
			getCommodityInfo(key,value){
				this[key]=value;
				var readyData={
					"counter":this.counter,
					"downmenu":this.downmenu,
					"radios":this.radios
				}
			}
		},
		computed:{
			getTotalprice(){
				this.$store.dispatch("updatePrice",this.counter*5+this.downmenu*10+this.radios*3)
				return this.$store.getters.getTotalPrice
			}
		}
	}
</script>

<style scoped>
.car-container{
	position: absolute;
	background: #fff;
	width: 900px;
	height: 352px;
}
.add-order{
	margin: 30px 50px;
}
.join-button{
	border-right: 1px solid #fff;
	border-radius: 25px 0 0 25px;
	width: 100px;
	height: 40px;
	background: #42B983;
	text-align: center;
	line-height: 40px;
}
.buy-button{
	border-left: 1px solid #fff;
	border-radius: 0 25px 25px 0;
	width: 100px;
	height: 40px;
	background: #42B983;
	text-align: center;
	line-height: 40px;
}
.join-button a,.buy-button a{
	color: #fff;
}
.fl{
	float: left;
}
</style>