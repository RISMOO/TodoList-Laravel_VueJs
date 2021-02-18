<template>
  <div class="container shadow  mt-3">
    <div class="form-row mb-4">
      <div class="col-row">
          <i class="fas fa-search"></i>
        <input
          type="text"
          class="mt-3"
          name="form-control"
          @keyup="searchTask"
          v-model="q"
          placeholder="Rechercher une tâche..."
        />

        <!--a chaque evenment de notre input on ajoute la recherche dans la variable q-->
      </div>
    </div>

    <add-task @task-added="refresh"></add-task
    ><!--si on ajoute  a une tache- on refresh la liste-->
    <ul class="list-group">
      <li
        class="list-group-item d-flex justify-content-between align-items-center"
        v-for="task in tasks.data"
        :key="task.id"
      >
        <a href="#"><p>{{ task.name }}</p></a>
        <div>
          <button
            type="button"
            class="btn btn-secondary blue"
            data-toggle="modal"
            data-target="#editModal"
            @click="getTask(task.id)"
          >
         <i class="fas fa-edit"></i>
            <!--avec notre requete axios on recupere la task avec lid-->


          </button>
          <button
            type="button"
            class="btn btn-danger bt2"
            data-toggle="modal"
            @click="deleteTask(task.id)"
          >
           <i class="fas fa-trash-alt"></i>
            <!--on recupere la task avec lid-->


          </button>
        </div>
      </li>
      <edit-task
        v-bind:taskToEdit="taskToEdit"
        @task-updated="refresh"
      ></edit-task
      ><!--v-bind=passer d"un composant un autre PROPS-->
      <!--on retrouve le v-bind dans editTask.component -->
      <!-- des quon a editer on refresh-->

      <!--TASKS.DATA pagination-->
    </ul>
    <!--PAGINATION-->
    <pagination
      :data="tasks"
      @pagination-change-page="getResults"
      class="mt-2 mb-2"
    ></pagination>
    <!--AU CLICK DE CHANGEMENT DE PAGE ON FAIT APPEL A UNE FONCTION-->
  </div>
</template>

<script>
export default {
  data() {
    //proprieté data qui est une fonction

    return {
      //retourne un objet
      tasks: {}, //un objet vide ,jy accederai plus bas avec this tasks
      taskToEdit: "",
      q: "",
    };
  },

  created() {
    //appel base de donnée

    axios
      .get("http://127.0.0.1:8000/tasksList")

      .then((response) => (this.tasks = response.data)) //j'apelle la fonction response (qui est une promise) qui est une fonction asynChrone qui attends nos taches
      //tasks est egal a response
      .catch((error) => console.log(error)); //si erreur
  },

  methods: {
    getResults(page = 1) {
      axios
        .get("http://127.0.0.1:8000/tasksList?page=" + page)
        .then((response) => {
          this.tasks = response.data;
          //PAGINATION
        });
    },
    //FONCTION EDIT
    getTask(id) {
      axios
        .get("http://127.0.0.1:8000/tasks/edit/" + id) //on creer une route
        .then((response) => (this.taskToEdit = response.data)) //= au click on recupere la tache
        .catch((error) => console.log(error)); //si il y aune erreur on l'attrape
    },

    //FONCTION DELETE
    deleteTask(id) {
      axios
        .delete("http://127.0.0.1:8000/tasks/" + id) //on creer une route
        .then((response) => (this.tasks = response.data)) //au click on supprime la tache
        .catch((error) => console.log(error));
    },

    searchTask() { ///on fait une recherche

 if (this.q.length > 3) {
        //on ne fera pas notre reqeute en permanence
        axios
          .get("http://127.0.0.1:8000/tasksList/" + this.q) //On creer une route

          .then((response) => (this.tasks = response.data))
          //tasks est egal a response
          .catch((error) => console.log(error)); //si erreur
      } else {//sinon on affiche la liste
        axios
          .get("http://127.0.0.1:8000/tasksList")

          .then((response) => (this.tasks = response.data)) //j'apelle la fonction response (qui est une promise) qui est une fonction asynChrone qui attends nos taches
          //tasks est egal a response
          .catch((error) => console.log(error)); //si erreur
      }


    },

    refresh(tasks) {
      this.tasks = tasks.data;
    },
  },
  get mounted() {
    console.log("Task mounted.");
  },
};
</script>
