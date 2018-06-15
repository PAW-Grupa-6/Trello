<template>
  <v-app>  

    <v-toolbar>
     <v-menu offset-y>
      <v-btn primary flat slot="activator"><v-icon left>web</v-icon> Boards</v-btn>
        <v-list>
          <v-list-tile v-for="item in items" :key="item.title">
            <v-list-tile-title>{{item.title}}</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
      
      <v-spacer></v-spacer>
      <v-toolbar-title v-text="title"></v-toolbar-title>
      <v-spacer></v-spacer>

      <div>
        <router-link to="/register" tag="span"><v-btn flat>Register</v-btn></router-link>
        <router-link to="/login" tag="span"><v-btn flat>Login</v-btn></router-link>
      </div>
    </v-toolbar>

    <main>   
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </main>

  </v-app>
</template>



<script>
export default {
  data () {
    return {
      clipped: false,
      drawer: true,
      fixed: false,

      items: [
      {        
        title: 'Issue1'
      },
      {        
        title: 'Issue2'
      },
      {        
        title: 'Issue3'
      }],
   
      title: 'trello7'
    }
  },

  mounted(){

  }
}

</script>


