const { createApp } = Vue
// invoco il metodo da vue
createApp({
  data() {
    return {
      title: 'To Do List',
      // array di oggetti todos
      todos: [],
      // variabile collegata con il binding v-model
      newTodo: ''
    }
  },
  methods: {
    // questa funziona andra' a chiedere i dati con axios di tipo get al server.php
    fetchData() {
      axios.get('./server.php')
        // prendiamo effettivamente la risposta dal server
        .then((res) => {
          // assegniamo all'array todos i valori dell'array che recuperiamo da server/php
          this.todos = res.data.results
        })
    },
    // metodo creato per inviare il nuovo elemento da salvare nell'array
    // metodo invocato con @keyup.enter
    storeTodo() {
      const data = {
        todo: this.newTodo
      }
      axios.post('./store.php', data, {
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
  // eseguiamo la funzione fetchData() invocandola
  created() {
    this.fetchData()
  },
}).mount('#app')              // montiamo l'app in id="app"