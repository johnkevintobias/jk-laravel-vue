<template>
    <div>
        <h3 class="text-center">Create Service Record</h3>
        <div class="row">
            <div class="col-md-6 offset-3">
                <form>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Date From</label>
                            <input type="date" class="form-control" v-model="service_record.date_from">
                            <small class="text-danger" v-if="validationErrors.date_from">
                                {{ validationErrors.date_from[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label>Date To</label>
                            <input type="date" class="form-control" v-model="service_record.date_to">
                            <small class="text-danger" v-if="validationErrors.date_to">
                                {{ validationErrors.date_to[0] }}
                            </small>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Employee ID</label>
                            <input type="text" class="form-control" v-model="service_record.employee_id">
                            <small class="text-danger" v-if="validationErrors.employee_id">
                                {{ validationErrors.employee_id[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" class="form-control" v-model="service_record.position">
                            <small class="text-danger" v-if="validationErrors.position">
                                {{ validationErrors.position[0] }}
                            </small>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" min="5000" step="100" class="form-control" v-model="service_record.salary">
                            <small class="text-danger" v-if="validationErrors.salary">
                                {{ validationErrors.salary[0] }}
                            </small>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <div class="form-group d-grid gap-2">
                            <button type="button" @click="addServiceRecord" class="btn btn-primary">Create</button>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group d-grid gap-2">
                            <button type="button" @click="resetServiceRecord" class="btn btn-danger">Reset</button>
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
                service_record: {
                    salary: 5000
                },
                validationErrors: {},
            }
        },
        methods: {
            addServiceRecord() {
                this.resetValidationErrors();
                this.axios
                    .post('http://localhost:8000/api/service-record', this.service_record)
                    .then(response => (
                        this.$router.push({ name: 'service-records' })
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
            resetServiceRecord() {
                this.service_record = {
                                    salary: 5000
                                };
            },
            resetValidationErrors() {
              this.validationErrors = {};
            }
        }
    }
</script>