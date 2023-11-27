<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP ToDo List JSON</title>
  <!-- vue import cdn -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <!-- axios import cdn -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- css file link -->
  <link rel="stylesheet" href="./css/app.css">
</head>
<body>
  <!-- applicativo montato da app.js vue app -->
  <div id="app">
    <main>
      <section>
        <div class="container">
          <h1>{{title}}</h1>
        <!-- input che all'invio faremo la chiamata che agginge una todo al array -->
        <!-- v-model collegato a variabile file js -->
        <input type="text" placeholder="Nuova ToDo" v-model.trim="newTodo" @keyup.enter="storeTodo">
        </div>
      </section>
      <section>
        <div class="container">
          <ul class="todos">
            <!-- direttiva v-for che cicla l'array todos -->
            <li  class="todos__item" :class="{ 
              done: todo.done
              }" v-for="(todo, i) in todos" :key="i">
              <span>{{todo.text}}</span>
              <span @click="removeTask(i)">elimina</span>
            </li>
          </ul>
        </div>
      </section>
    </main>
  </div>
  <!-- js file link -->
  <script src="./js/app.js"></script>
</body>
</html>