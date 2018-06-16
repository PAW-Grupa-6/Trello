<template>
  <div>
    <div v-for="(list, i) in lists" :key="i">
      <drop class="drop list" @drop="handleDrop(list, ...arguments)">
        <drag v-for="item in list"
          class="drag"
          :key="item"
          :class="{ [item]: true }"
          :transfer-data="{ item, list, example: 'lists' }">
            {{ item }}
        </drag>
      </drop>
    </div>
  </div>
</template>

<script>
  import { Drag, Drop } from 'vue-drag-drop';
  export default {
    components: { Drag, Drop },
    data() {
      return {
        lists: [
          ['A', 'B', 'C'],          ['D', 'E', 'F'],          ['G', 'H', 'I'],
        ],
      };
    },
    methods: {
      handleDrop(toList, data) {
        const fromList = data.list;
        if (fromList) {
          toList.push(data.item);
          fromList.splice(fromList.indexOf(data.item), 1);
          toList.sort((a, b) => a > b);
        }
      },
    },
  };
</script>

<style scoped>
  .drag {
    display: block;
  }
  .drag.A { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.B { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.C { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.D { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.E { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.F { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.G { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.H { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}
  .drag.I { background: #eee; width: 100%; height: 70px; padding-left: 50%; padding-top: 20px; margin-top: 10px;}

  .drop {
    
    display: inline-block;    
    padding: 15px;
    margin-bottom: 20px;
    width: 28%;
    min-height: 100px;
    background: #ccc;
    float: left;
    margin-left: 4%;
  }
</style>