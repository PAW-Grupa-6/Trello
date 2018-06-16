import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/HelloWorld'
import Register from '@/components/Register'
import Login from '@/components/Login'
import Boards from '@/components/Boards'
import SingleBoard from '@/components/SingleBoard'

Vue.use(Router)

export default new Router({
  routes: [

    {
      path: '/login',
      name: 'Login',
      component: Login
    },

    {
      path: '/register',
      name: 'Register',
      component: Register
    },

    {
      path: '/boards',
      name: 'Boards',
      component: Boards
    },

    {
      path: '/singleboard',
      name: 'SingleBoard',
      component: SingleBoard
    }

  ],

 mode:'history'

})
