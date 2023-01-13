<script>
import todoList from './components/todoList.vue';

export default {
  name: "App",
  components: {
    todoList,
  },
}
</script>

<template>
  <todoList />
</template>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: rgb(180, 92, 92);
}
</style>
