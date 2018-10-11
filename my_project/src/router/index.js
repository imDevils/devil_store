import Vue from 'vue'
import Router from 'vue-router'
import Layout from "@/pages/layout"
import Detail from "@/pages/detail"
import Login from "@/pages/login"
import Earth from "@/pages/detail/earth"
import Loud from "@/pages/detail/loud"
import Car from "@/pages/detail/car"
import Hill from "@/pages/detail/hill"

Vue.use(Router)

export default new Router({
	linkActiveClass:"active",
  routes: [
    {
      path: '/',
      name: 'Layout',
      component: Layout
    },
    {
    	path: "/detail",
    	name: "detail",
    	component: Detail,
    	redirect: "/detail/earth",
    	children:[
    		{
    			path: "earth",
		    	name: "earth",
		    	component: Earth
    		},
    		{
    			path: "loud",
		    	name: "loud",
		    	component: Loud
    		},
    		{
    			path: "car",
		    	name: "car",
		    	component: Car
    		},
    		{
    			path: "hill",
		    	name: "hill",
		    	component: Hill
    		}
    	]
    },
    {
	    path: '/login',
	    name: 'Login',
	    component: Login
    }
  ]
})
