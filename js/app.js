const { createApp } = Vue

createApp({
  data() {
    return {
      title: 'To Do List',
      todos: [],
      newTodo: ''
    }
  },
  methods: {
    fetchData() {
      axios.get('./server.php')
        .then((res) => {
          console.log(res.data.results);
          this.todos = res.data.results
        })
    },
    storeTodo() {
      const data = {
        todo: this.newTodo,
      }
      axios.post('store.php', data, {
        headers: {
          'Content-Type': 'multipart/form-data',
        },
      })
        .then((res) => {
          this.todos = res.data.todos;
          this.newTodo = '';
        })
    },
  },
  created() {
    this.fetchData()
  },
}).mount('#app')