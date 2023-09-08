<template>
    <div>
        <h3 class="text-center">Add Employee Record</h3>
        <div class="row">
            <div class="col-md-6 offset-3">
                <form>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" v-model="employee.first_name">
                            <small class="text-danger" v-if="validationErrors.first_name">
                                {{ validationErrors.first_name[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" v-model="employee.middle_name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" v-model="employee.last_name">
                            <small class="text-danger" v-if="validationErrors.last_name">
                                {{ validationErrors.last_name[0] }}
                            </small>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" v-model="employee.birth_date">
                            <small class="text-danger" v-if="validationErrors.birth_date">
                                {{ validationErrors.birth_date[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" v-model="employee.gender" @change="removeEmptyOption('gender')">
                                <option value="" selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <small class="text-danger" v-if="validationErrors.gender">
                                {{ validationErrors.gender[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="maritalStatus">Marital Status</label>
                            <select class="form-control" id="maritalStatus" name="maritalStatus" v-model="employee.marital_status" @change="removeEmptyOption('maritalStatus')">
                                <option value="" selected>Select Marital Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                            <small class="text-danger" v-if="validationErrors.marital_status">
                                {{ validationErrors.marital_status[0] }}
                            </small>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <div class="form-group d-grid gap-2">
                            <button type="button" @click="addEmployee" class="btn btn-primary">Create</button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group d-grid gap-2">
                            <button type="button" @click="resetEmployee" class="btn btn-danger">Reset</button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                employee: {
                    gender: '',
                    marital_status: ''
                },
                validationErrors: {},
            }
        },
        methods: {
            addEmployee() {
                this.resetValidationErrors();
                this.axios
                    .post('http://localhost:8000/api/employee', this.employee)
                    .then(response => (
                        this.$router.push({ name: 'dashboard' })
                    ))
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                          // Handle validation errors (HTTP status 422)
                          // You can access validation errors from the response data
                          const validationErrors = error.response.data.errors;
                          // Handle validation errors (e.g., display them to the user)
                          this.validationErrors = validationErrors;
                          console.log(this.validationErrors);
                        } else {
                          // Handle other types of errors (e.g., server errors)
                          console.error(error);
                        }
                    })
                    .finally(() => this.loading = false)
            },
            removeEmptyOption(id) {
              const selectElement = document.getElementById(id);
              if (selectElement) {
                const emptyOption = selectElement.querySelector('option[value=""]');
                if (emptyOption) {
                  selectElement.removeChild(emptyOption);
                }
              }
            },
            resetEmployee() {
                this.employee = {
                                    gender: '',
                                    marital_status: ''
                                };
            },
            resetValidationErrors() {
              this.validationErrors = {};
            }
        }
    }
</script>