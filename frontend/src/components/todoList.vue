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

      axios.get(apiUrl + "api.php")
        .then(res => {

          const data = res.data;

          this.todolist = data;
        });
    },

    createNewTask(event) {

      event.preventDefault();

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
  <div class="container">

    <h1>ToDo List</h1>

    <form @submit="createNewTask">
      <input type="text" name="text" v-model="newTodoText" id="text-zone" placeholder=" task...">
      <input type="submit" value="Add" class="btn">
    </form>

    <ul>
      <li v-for="(elem, index) in todolist" :key="index">
        <div class="text-list">
          {{ elem.text }}
        </div>

        <div class="btn-check-remove">
          <!-- btn done -->
          <font-awesome-icon icon="fa-solid fa-check" id="check" />

          <!-- btn trash -->
          <font-awesome-icon icon="fa-solid fa-trash-can-arrow-up" id="trash" />
        </div>
      </li>
    </ul>

  </div>
</template>

<style lang="scss" scoped>
.container {
  max-width: 600px;
  margin: 0 auto;
  color: white;
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
  padding-top: 50px;

  h1 {
    border: 1px solid white;
    border-radius: 5px;
    padding: 5px 15px;
    color: rgb(120, 92, 180);
    background-color: white;
  }

  form {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 30px;

    #text-zone,
    .btn {
      border: 1px solid white;
      border-radius: 5px;
      padding: 8px 20px;
      text-align: center;
      font-size: 12px;
      color: rgb(120, 92, 180);
      background-color: white;
    }
  }

  ul {
    list-style: none;
    line-height: 60px;
    padding: 25px;
    padding-bottom: 50px;
    margin-top: 30px;
    border-radius: 5px;
    background-color: white;
    color: rgb(120, 92, 180);

    li {
      border-bottom: 1px solid rgb(120, 92, 180);
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;

      .btn-check-remove {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;

        &:hover {
          cursor: pointer;
        }
      }

      #check {
        color: #3aee3a;
      }

      #trash {
        color: #f44;
      }
    }
  }
}
</style>