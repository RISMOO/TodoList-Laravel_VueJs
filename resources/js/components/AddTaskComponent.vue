<template>
  <div>
    <!-- Button trigger modal -->
    <button
      type="button"
      class="btn btn-primary my-3 bt1"
      data-toggle="modal"
      data-target="#exampleModalCenter"
    >
    <i class="fas fa-plus"></i>
      Ajouter une tache
    </button>

    <!-- Modal -->
    <div
      class="modal fade shadow"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">
              Modal title
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="">Nom de la tâche</label>
                <textarea
                  name="name"
                  id="name"
                  rows="4"
                  class="form-control"
                  v-model="name"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-success bt1" @click="storeTask" data-dismiss="modal" >
              Creer une tâche
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: "",
    }
  },
  methods: {
    storeTask() {
      //ON FAIT UNE REQUETE AVEC AXIOS on lui donne en param nom

      axios
        .post("http://127.0.0.1:8000/tasksList", {
          name: this.name
        })
        .then(response =>this.$emit('task-added',response))//on creer une evenment personaliseé $emit/response=liste des taches
        .catch(error => console.log(error));
    }
  }
}
</script>
