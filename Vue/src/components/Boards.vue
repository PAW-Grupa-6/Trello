<template>
  <v-container grid-list-xl>
    <v-layout v-bind="binding">

      <v-flex>
        <v-card dark color="primary">          
          <div>
            <router-link to="/singleboard" tag="span"><v-card-text>Tasks group1</v-card-text></router-link>
          </div> 
        </v-card>
      </v-flex>

      <v-flex>
        <v-card dark color="secondary">
          <div>
            <router-link to="/singleboard" tag="span"><v-card-text>Tasks group2</v-card-text></router-link>
          </div> 
        </v-card>
      </v-flex>

      <v-flex>
        <v-card dark color="accent">
          <div>
            <router-link to="/singleboard" tag="span"><v-card-text>Tasks group3</v-card-text></router-link>
          </div>          
        </v-card>
      </v-flex>


    </v-layout>
  </v-container>
</template>

	<script>


</script>
