<template>
	<div>
		订单信息：<br />
		购买数量：{{ getOrder.counter }}<br />
		产品类型：{{ getOrder.downmenu }}<br />
		购买时间：{{ getOrder.radios }}<br />
		总价：{{ getTotalPrice }}
	</div>
</template>

<script>
	export default{
		name:"loud",
		data(){
			return{
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
		computed:{
			getOrder(){
				return this.$store.getters.getOrder
			},
			getTotalPrice(){
				return this.$store.getters.getTotalPrice
			}
		}
	}
</script>

<style>
</style>