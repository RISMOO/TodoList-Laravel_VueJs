<template>
  <div
    class="modal fade"
    id="editModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModal">Edit Modal title</h5>
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
                v-model="taskToEdit.name"
              ></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-success bt1" @click="update" data-dismiss="modal">
            Editer
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["taskToEdit"], //props que lon retrouve dans TaskComponent
  methods: {
    update() {
      axios.patch("http://127.0.0.1:8000/tasks/edit/" + this.taskToEdit.id, {
        name: this.taskToEdit.name//ON ENREGISTRE LA NOUVELLE TACHE

      }) //ON MET A JOUR avec L'ID et on ouvre un objet
      .then(response=>this.$emit('task-updated',response))// on creer un evenment
      .catch(error=>console.log(error));
    }
  }
}
</script>
