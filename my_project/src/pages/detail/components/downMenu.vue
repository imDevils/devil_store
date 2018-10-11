<template>
	<div class="select-component">
		<div class="select-show" @click="showHide">
			<span>{{ this.selectData[nowIndex].name }}</span>
			<div class="arrow"></div>
		</div>
		<div class="select-list" v-show="show">
			<ul>
				<li @click="selectBtn(index)" v-for="(item,index) in selectData">{{ item.name }}</li>
			</ul>
		</div>
	</div>
</template>

<script>
	export default{
		name:"downmenu",
		data(){
			return{
				nowIndex:0,
				show:false
			}
		},
		props:{
			selectData:{
				type:Array,
				default:function(){
					return [
								{
									name:"test",
									value:1
								}
					]
				}
			}
		},
		methods:{
			selectBtn(index){
				this.nowIndex=index;
				this.show=false;
				this.$emit("downmenu",this.selectData[index].value)
				this.$store.dispatch("updateOrder",["downmenu",this.selectData[index].value])
			},
			showHide(){
				this.show = !this.show;
			}
		}
	}
</script>

<style scoped>
.select-component{
	position: relative;
	display: inline-block;
}
.select-show{
	border: 1px solid #E3E3E3;
	padding: 0 20px 0 10px;
	display: inline-block;
	position: relative;
	cursor: pointer;
	height: 25px;
	line-height: 25px;
	border-radius: 3px;
	background: #FFFFFF;
}
.select-show .arrow{
	display: inline-block;
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	border-top: 5px solid #E3E3E3;
	width: 0;
	height: 0;
	margin-top: -1px;
	margin-left: 6px;
	margin-right: -14px;
	vertical-align: middle;
}
.select-list{
	display: inline-block;
	position: absolute;
	width: 100%;
	background: #FFFFFF;
	border-top: 1px solid #E3E3E3;
	border-bottom: 1px solid #E3E3E3;
	z-index: 5;
}
.select-list li{
	padding: 5px 15px 5px 10px;
	border-left: 1px solid #E3E3E3;
	border-right: 1px solid #E3E3E3;
	cursor: pointer;
	background: #FFFFFF;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.select-list  li:hover{
	background: #E3E3E3;
}
</style>