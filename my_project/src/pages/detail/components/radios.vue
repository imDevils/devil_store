<template>
	<div class="chooseTime-component">
		<ul class="chooseTime-list">
			<li @click="choose(index)" v-for="(item,index) in Radios" :class="{'active':index==nowIndex}">{{ item.title }}</li>
		</ul>
	</div>
</template>

<script>
	export default{
		name:"radios",
		data(){
			return{
				nowIndex:0
			}
		},
		props:{
			Radios:{
				type:Array,
				default:function(){
					return[
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
			}
		},
		methods:{
			choose(index){
				this.nowIndex=index;
				this.$emit("radios",this.Radios[index].value)
				this.$store.dispatch("updateOrder",["radios",this.Radios[index].value])
			}
		}
	}
</script>

<style scoped>
.chooseTime-component{
	position: relative;
	display: inline-block;
}
.chooseTime-list li{
	display: inline-block;
	border: 1px solid #E3E3E3;
	height: 25px;
	line-height: 25px;
	padding: 0 8px;
	margin-right: 5px;
	border-radius: 3px;
	text-align: center;
	cursor: pointer;
}
.chooseTime-list li.active{
	border-color: #4FC08D;
	background: #4FC08D;
	color: #fff;
}
</style>