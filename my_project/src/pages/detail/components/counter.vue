<template>
	<div class="counter-component">
		<div class="counter-btn" @click="minus"> - </div>
		<div class="counter-show">
			<input type="text" v-model="number" @keyup="inputHandler" />
		</div>
		<div class="counter-btn" @click="add"> + </div>
	</div>
</template>

<script>
	export default{
		name:"counter",
		data(){
			return{
				number:1
			}
		},
		props:{
			max:{
				type:Number,
				default:5
			},
			min:{
				type:Number,
				default:1
			}
		},
		methods:{
			minus(){
				if (this.number<=this.min) {
					return;
				}
				this.number--;
				this.$emit("counter",this.number)
				this.$store.dispatch("updateOrder",["counter",this.number])
			},
			add(){
				if (this.number>=this.max) {
					return;
				}
				this.number++;
				this.$emit("counter",this.number)
				this.$store.dispatch("updateOrder",["counter",this.number])
			},
			inputHandler(){
				//   \D:非数字
				let fix;
				if (typeof this.number === "string") {
					fix=Number(this.number.replace(/\D/g,""));
				}else{
					fix=this.number
				}
				if (fix>this.max || fix<this.min) {
					fix=this.min
				}
				this.number=fix;
				this.$emit("counter",this.number)
				this.$store.dispatch("updateOrder",["counter",this.number])
			}
		}
	}
</script>

<style scoped>
.counter-component{
	position: relative;
	display: inline-block;
	overflow: hidden;
	vertical-align: middle;
}
.counter-btn{
	width: 30px;
	height:30px;
    border: 1px solid #e3e3e3;
    text-align: center;
    line-height: 30px;
    cursor: pointer;
    float: left;
}
.counter-btn:hover{
	border-color: #4fc08d;
	background: #4FC08D;
	color: #fff;
}
.counter-show{
	float: left;
}
.counter-show input{
	border: none;
	border-top: 1px solid #E3E3E3;
	border-bottom: 1px solid #E3E3E3;
	outline: none;
	text-indent: 10px;
	width: 40px;
	height: 30px;
}
</style>