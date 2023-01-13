<script>
import axios from 'axios';

const apiUrl = "http://localhost/";

export default {
  name: "todoList",
  data() {

    return {

      todolist: [],
      newTodoText: ""
    };
  },
  methods: {

    getData() {

      axios.post(apiUrl + "api.php")
        .then(res => {

          const data = res.data;

          this.todolist = data;
        });
    },

    createNewTask(e) {

      e.preventDefault();

      const newTodoText = this.newTodoText;

      const params = {
        params: {
          "text": newTodoText
        }
      };

      axios.get(apiUrl + "apiTodoCreate.php", params)
        .then(() => {

          this.newTodoText = "";
          this.getData();
        });
    }
  },
  mounted() {

    this.getData();
  }
}
</script>

<template>
  <h1>ToDo List</h1>
  <ul>
    <li v-for="(elem, index) in todolist" :key="index">
      {{ elem.text }}
    </li>
  </ul>
  <form @submit="createNewTask">
    <input type="text" name="text" v-model="newTodoText">
    <input type="submit" value="Create new task">
  </form>
</template>

<style lang="scss" scoped>

</style>