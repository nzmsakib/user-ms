<script>
import ManageLayout from "@/Layouts/Manage.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  layout: ManageLayout,

  components: {
    Head,
  },
  data() {
    return {
      maxForms: 10,
      forms: [
        {
          name: '',
        },
      ],
    }
  },
  methods: {
    // Submits all form data as array
    submitAll() {
      Inertia.post(route("manage.roles.index"), this.forms);
    },
    // Adds a form to a specific index
    addForm(idx = this.forms.length, form = { name: '' }) {
      if (this.forms.length >= this.maxForms) return;
      this.forms.splice(idx, 0, form);
    },
    // Delete a form at a specific index
    deleteForm(idx) {
      this.forms.splice(idx, 1);
    }
  },
};
</script>

<template>
  <Head title="Create Role" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          Good! You're in Role creating page!
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto">
        <div class="card">
          <div class="card-title">
            <p class="text-center h2">
              Add new Role
            </p>
          </div>
          <div class="card-body">
            <div class="row my-2" v-for="(form, idx) in forms" :key="idx">
              <label for="name" class="col-sm-auto col-form-label"> Name </label>
              <div class="col-sm">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  v-model="form.name"
                />
              </div>
              <div class="col-sm-auto">
                <button class="text-white btn btn-primary me-2" @click="addForm(idx+1)" title="Add new form below">
                  <i class="bi-plus h4"></i>
                </button>
                <button class="text-white btn btn-primary me-2" @click="addForm(idx+1, { name: form.name })" title="Clone this form below">
                  <i class="h4 bi-layers-half"></i>
                </button>
                <button class="text-white btn btn-primary" @click="deleteForm(idx)" title="Delete this form">
                  <i class="h4 bi-trash"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button class="text-white btn btn-primary me-2" @click="addForm()" :hidden="forms.length > 0">
              <i class="bi-plus pe-2"></i>New Form
            </button>
            <button class="text-white btn btn-primary" @click="submitAll()" :disabled="forms.length <= 0">
              Submit All
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>